<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HostelController extends Controller
{
    // GET /hostels
    public function index(Request $request)
    {
        $hostels = Hostel::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%");
            })
            ->with(['vendor', 'rooms'])
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $vendors = User::paginate();

        return Inertia::render('Hostels/Index', [
            'hostels' => $hostels,
            'filters' => $request->only(['search']),
            'vendors' => $vendors,
        ]);
    }

    // GET /hostels/create
    public function create()
    {
        return Inertia::render('Hostels/Create');
    }

    // POST /hostels
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $validated['vendor_id'] = Auth::id(); // assign to the logged-in vendor

        Hostel::create($validated);

        return redirect()->route('hostels.index')->with('success', 'Hostel created successfully.');
    }

    // GET /hostels/{hostel}
    public function show(Hostel $hostel)
    {
        return Inertia::render('Hostels/Show', [
            'hostel' => $hostel->load(['vendor', 'rooms']),
        ]);
    }

    // GET /hostels/{hostel}/edit
    public function edit(Hostel $hostel)
    {
        return Inertia::render('Hostels/Edit', [
            'hostel' => $hostel,
        ]);
    }

    // PUT /hostels/{hostel}
    public function update(Request $request, Hostel $hostel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $hostel->update($validated);

        return redirect()->route('hostels.index')->with('success', 'Hostel updated successfully.');
    }

    // DELETE /hostels/{hostel}
    public function destroy(Hostel $hostel)
    {
        $hostel->delete();

        return redirect()->route('hostels.index')->with('success', 'Hostel deleted successfully.');
    }
}