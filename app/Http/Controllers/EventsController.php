<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.events', compact('events'));
    }

    public function indexEvent($id)
    {
        $event = Event::find($id);
        return view('events.infoEvent', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'     => 'required',
            'time'    => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'image' => 'required',
            'description' => 'required',
            'capacity' => 'required',
            'requirements' => 'required',
            'zoom' => 'required',
           
        ]);

        Event::create([
            'date' => $request->date,
            'time' => $request->time,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'image' => $request->image,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'requirements' => $request->requirements,
            'zoom' => $request->zoom,
            'special' => $request->special,
        ]);

        return redirect(route('events'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $request->validate([
            'date'     => 'required',
            'time'    => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'image' => 'required',
            'description' => 'required',
            'capacity' => 'required',
            'requirements' => 'required',
            'zoom' => 'required',
           
        ]);

        $event->update([
            'date' => $request->date,
            'time' => $request->time,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'image' => $request->image,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'requirements' => $request->requirements,
            'zoom' => $request->zoom,
            'special' => $request->special,
        ]);

        return redirect(route('events'));

    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect(route('events'));
    }
}
