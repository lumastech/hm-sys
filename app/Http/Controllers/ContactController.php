<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch contacts from the database
        $contacts = Contact::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('priority', 'desc')
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        // Pass the contacts to the Inertia view
        return Inertia::render('Contacts/Index', [
            'contacts' => $contacts,
            'filters' => $request->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Contacts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'phone' => 'required|string|max:20',
            'phone_2' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ]);

        // Add the authenticated user's ID to the data
        $validatedData['user_id'] = auth()->id();

        // Create the contact
        Contact::create($validatedData);

        // Redirect to the contacts index page with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return Inertia::render('Contacts/Show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/Edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'phone' => 'required|string|max:20',
            'phone_2' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ]);

        // Update the contact
        $contact->update($validatedData);

        // Redirect to the contacts index page with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        // Delete the contact
        $contact->delete();

        // Redirect to the contacts index page with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}