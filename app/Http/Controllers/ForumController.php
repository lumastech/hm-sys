<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $forums = Forum::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->with(['user', 'business'])
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Forums/Index', [
            'forums' => $forums,
            'filters' => $request->only(['search']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Forums/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_id' => 'nullable|exists:businesses,id',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('forums', 'public');
        }

        Forum::create($validatedData);

        return redirect()->route('forums.index')->with('success', 'Forum created successfully.');
    }

    public function show(Forum $forum)
    {
        return Inertia::render('Forums/Show', [
            'forum' => $forum->load(['user', 'business', 'threads']),
        ]);
    }

    public function edit(Forum $forum)
    {
        return Inertia::render('Forums/Edit', [
            'forum' => $forum,
        ]);
    }

    public function update(Request $request, Forum $forum)
    {
        $validatedData = $request->validate([
            'business_id' => 'nullable|exists:businesses,id',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            if ($forum->image) {
                Storage::disk('public')->delete($forum->image);
            }
            $validatedData['image'] = $request->file('image')->store('forums', 'public');
        }

        $forum->update($validatedData);

        return redirect()->route('forums.index')->with('success', 'Forum updated successfully.');
    }

    public function destroy(Forum $forum)
    {
        if ($forum->image) {
            Storage::disk('public')->delete($forum->image);
        }

        $forum->delete();

        return redirect()->route('forums.index')->with('success', 'Forum deleted successfully.');
    }
}