<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->with(['user', 'business'])
            ->orderBy('start_date')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Events/Index', [
            'events' => $events,
            'filters' => $request->only(['search']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Events/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_id' => 'nullable|exists:businesses,id',
            'category' => 'required|string|max:255',
            'access' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return Inertia::render('Events/Show', [
            'event' => $event->load(['user', 'business']),
        ]);
    }

    public function edit(Event $event)
    {
        return Inertia::render('Events/Edit', [
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'business_id' => 'nullable|exists:businesses,id',
            'category' => 'required|string|max:255',
            'access' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validatedData['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}