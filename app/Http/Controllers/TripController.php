<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::simplePaginate(15);

        return view('admin.trip.index', compact('trips'));
    }

    public function create()
    {
        $trips = Trip::whereNull('parent_id')->get();

        return view('admin.trip.add', compact('trips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
        ]);
        $image = 'storage/'.$request->file('image')->store('image/trip', 'public');

        Trip::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('trip.index')->withSuccess('The trip has been added!');
    }

    public function show(Trip $trip)
    {
        return view('admin.trip.view', compact('trip'));
    }

    public function edit(Trip $trip)
    {
        return view('admin.trip.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'flag' => 'mimes:jpg,png,jpeg',
        ]);

        $flag = $trip->flag;
        $image = $trip->image;

        if ($request->hasFile('image')) {
            Storage::delete($trip->image);
            $image = 'storage/'.$request->file('image')->store('image/trip', 'public');
        }
        if ($request->hasFile('flag')) {
            Storage::delete($trip->flag);
            $flag = 'storage/'.$request->file('flag')->store('image/trip', 'public');
        }

        $trip->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'flag' => $flag,
        ]);

        return redirect()->route('trip.index')->withSuccess('The trip has been updated!');
    }

    public function destroy(Trip $trip)
    {
        Storage::delete($trip->image);
        Storage::delete($trip->flag);
        $trip->delete();

        return redirect()->route('trip.index')->withSuccess('The trip has been deleted');
    }
}
