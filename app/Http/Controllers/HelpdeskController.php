<?php

namespace App\Http\Controllers;

use App\Models\Helpdesk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HelpdeskController extends Controller
{
    public function index(Request $request)
    {
        $helpdesks = Helpdesk::query()
            ->with('attendedBy')
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('subject', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Helpdesks/Index', [
            'helpdesks' => $helpdesks,
            'filters' => $request->only(['search']),
            'staff' => User::where('role', 'staff')->get(['id', 'name']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Helpdesks/Create', [
            'staff' => User::where('role', 'staff')->get(['id', 'name']),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'attended_by' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:open,in_progress,resolved',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('helpdesks', 'public');
        }

        Helpdesk::create($validatedData);

        return redirect()->route('helpdesks.index')->with('success', 'Helpdesk ticket created successfully.');
    }

    public function show(Helpdesk $helpdesk)
    {
        return Inertia::render('Helpdesks/Show', [
            'helpdesk' => $helpdesk->load('attendedBy'),
        ]);
    }

    public function edit(Helpdesk $helpdesk)
    {
        return Inertia::render('Helpdesks/Edit', [
            'helpdesk' => $helpdesk,
            'staff' => User::where('role', 'staff')->get(['id', 'name']),
        ]);
    }

    public function update(Request $request, Helpdesk $helpdesk)
    {
        $validatedData = $request->validate([
            'attended_by' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:open,in_progress,resolved',
        ]);

        if ($request->hasFile('image')) {
            if ($helpdesk->image) {
                Storage::disk('public')->delete($helpdesk->image);
            }
            $validatedData['image'] = $request->file('image')->store('helpdesks', 'public');
        }

        $helpdesk->update($validatedData);

        return redirect()->route('helpdesks.index')->with('success', 'Helpdesk ticket updated successfully.');
    }

    public function destroy(Helpdesk $helpdesk)
    {
        if ($helpdesk->image) {
            Storage::disk('public')->delete($helpdesk->image);
        }

        $helpdesk->delete();

        return redirect()->route('helpdesks.index')->with('success', 'Helpdesk ticket deleted successfully.');
    }
}