<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('dashboard/events/index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'address' => 'required',
             'zip' => 'required',
             'city' => 'required',
            'description' => 'required|min:10',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'ticket_price' => 'numeric',
            'service_costs' => 'numeric'
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->address = $request->address;
        $event->zip = $request->zip;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->ticket_price = $request->ticket_price;
        $event->service_costs = $request->service_costs;
        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard/events/show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard/events/edit')
                ->with(['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'description' => 'required|min:10',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'ticket_price' => 'numeric',
            'service_costs' => 'numeric'
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->address = $request->address;
        $event->zip = $request->zip;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->ticket_price = $request->ticket_price;
        $event->service_costs = $request->service_costs;
        $event->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('events.index');
    }
}
