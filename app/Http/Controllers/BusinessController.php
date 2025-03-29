<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        // Fetch Businesses from the database
        $businesses = Business::query()
            ->with('user') // Eager load the user relationship
            ->when($request->input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        // Pass the businesses to the Inertia view
        return Inertia::render('Businesses/Index', [
            'businesses' => $businesses,
            'filters' => $request->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Businesses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'user_id' => 'nullable|numeric',
            'contact_id' => 'nullable|numeric',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subcategory' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive',
            'image' => 'nullable|numeric',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Businesses', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Add the authenticated user's ID to the data
        $validatedData['user_id'] = auth()->id();

        // Create the Business
        Business::create($validatedData);

        // Redirect to the Businesses index page with a success message
        return redirect()->route('Businesses.index')->with('success', 'Business created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $Business)
    {
        return Inertia::render('Businesses/Show', [
            'Business' => $Business,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $Business)
    {
       return Inertia::render('Businesses/Edit', [
            'Business' => $Business,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $Business)
    {
        // Validate the request
        $validatedData = $request->validate([
            'user_id' => 'required|numeric',
            'contact_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subcategory' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive',
            'image' => 'nullable|numeric',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($Business->image) {
                Storage::disk('public')->delete($Business->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('Businesses', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the Business
        $Business->update($validatedData);

        // Redirect to the Businesses index page with a success message
        return redirect()->route('Businesses.index')->with('success', 'Business updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $Business)
    {
        // Delete the associated image if it exists
        if ($Business->image) {
            Storage::disk('public')->delete($Business->image);
        }

        // Delete the Business
        $Business->delete();

        // Redirect to the Businesses index page with a success message
        return redirect()->route('Businesses.index')->with('success', 'Business deleted successfully.');
    }
}
