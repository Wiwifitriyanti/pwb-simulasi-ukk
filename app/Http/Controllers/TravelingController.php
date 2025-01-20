<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traveling;
use App\Models\User;

class TravelingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $travelLogs = Traveling::orderBy('travel_date', 'desc')->get();
        return view('travel.index', compact('travelLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'travel_date' => 'required|date',
            'travel_time' => 'required',
            'location' => 'required|string|max:255',
            'body_temperature' => 'required|numeric|min:35|max:42',
        ]);

        Traveling::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'travel_date' => $request->travel_date,
            'travel_time' => $request->travel_time,
            'location' => $request->location,
            'body_temperature' => $request->body_temperature,
        ]);

        return redirect()->route('travel.index')->with('success', 'Catatan perjalanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $travelLog = Traveling::findOrFail($id);
        return view('travel.view', compact('travelLog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $travelLog = Traveling::findOrFail($id);
        return view('travel.edit', compact('travelLog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'travel_date' => 'required|date',
            'travel_time' => 'required',
            'location' => 'required|string|max:255',
            'body_temperature' => 'required|numeric|min:35|max:42',
        ]);

        $travelLog = Traveling::findOrFail($id);
        $travelLog->update([
            'travel_date' => $request->travel_date,
            'travel_time' => $request->travel_time,
            'location' => $request->location,
            'body_temperature' => $request->body_temperature,
        ]);

        return redirect()->route('travel.index')->with('success', 'Catatan perjalanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $travelLog = Traveling::findOrFail($id);
        $travelLog->delete();

        return redirect()->route('travel.index')->with('success', 'Catatan perjalanan berhasil dihapus.');
    }
}
