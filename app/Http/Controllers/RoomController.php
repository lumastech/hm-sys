<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validated = $request->validate([
            'room_number' => 'required|string|max:255',
            'hostel_id' => 'required|exists:hostels,id',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|string|in:available,occupied,under_maintenance',
        ]);



        Room::create($validated);

        return back()->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        // Fetch the room details from the database
        $roomDetails = Room::with(['hostel', 'beds'])->findOrFail($room->id);

        // Pass the room details to the Inertia view
        return Inertia::render('Rooms/Show', [
            'room' => $roomDetails,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
