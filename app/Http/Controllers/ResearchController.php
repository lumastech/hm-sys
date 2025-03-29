<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch research entries from the database
        $researches = Research::query()
            ->with('business', 'user') // Eager load the business and user relationships
            ->when($request->input('search'), function ($query, $search) {
                $query->where('category', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        // Pass the research entries to the Inertia view
        return Inertia::render('Researches/Index', [
            'researches' => $researches,
            'filters' => $request->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Researches/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'user_id' => 'required|exists:users,id',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'visibility' => 'required|in:public,private',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('researches', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Add the authenticated user's ID to the data
        $validatedData['user_id'] = auth()->id();

        // Create the research entry
        Research::create($validatedData);

        // Redirect to the research index page with a success message
        return redirect()->route('researches.index')->with('success', 'Research created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $research)
    {
        return Inertia::render('Researches/Show', [
            'research' => $research,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        return Inertia::render('Researches/Edit', [
            'research' => $research,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        // Validate the request
        $validatedData = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'user_id' => 'required|exists:users,id',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'visibility' => 'required|in:public,private',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($research->image) {
                Storage::disk('public')->delete($research->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('researches', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the research entry
        $research->update($validatedData);

        // Redirect to the research index page with a success message
        return redirect()->route('researches.index')->with('success', 'Research updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        // Delete the associated image if it exists
        if ($research->image) {
            Storage::disk('public')->delete($research->image);
        }

        // Delete the research entry
        $research->delete();

        // Redirect to the research index page with a success message
        return redirect()->route('researches.index')->with('success', 'Research deleted successfully.');
    }
}