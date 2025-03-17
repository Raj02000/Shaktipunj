<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::simplePaginate(15);

        return view('admin.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('admin.events.view', compact('event'));
    }

    public function create()
    {
        return view('admin.events.add');
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        return redirect()->route('event.index')->with('message', 'Event added successfully');
    }

    public function view()
    {
        $events = Event::all();

        return view('admin.events.view', compact('events'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.add', compact('event'));
    }

    public function update(StoreEventRequest $request, Event $event)
    {
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return redirect()->route('event.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event deleted successfully');
    }
}
