<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('Event/showEvent', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Event/createEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_title' => 'required|string',
            'start_date' => 'required| before:' . $request->end_date,
            'end_date' => 'required |after:' . $request->start_date,
            'recurrence1' => 'required',
            'recurrence2' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Event::create([
            'event_title' => $request->event_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'recurrence1' => $request->recurrence1,
            'recurrence2' => $request->recurrence2,
        ]);
        $events = Event::all();
        return view('Event.showEvent', [
            'success' => 'Event Successfully Created',
            'events' => $events,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $start_date = Carbon::parse($event->start_date);
        $end_date = Carbon::parse($event->end_date);
        $recurrence1 = $event->recurrence1;
        $recurrence2 = $event->recurrence2;

        $first = [
            'every' => 1,
            'every_other' => 2,
            'every_third' => 3,
            'every_fourth' => 4,
        ];
        $second = [
            'day' => 1,
            'week' => 7,
            'month' => 30,
            'year' => 365,
        ];
        $result = array();
        $total = null;
        while (strtotime($start_date) == strtotime($end_date)) {
            $total++;
            $increasing = $first[$recurrence1] * $second[$recurrence2];
            array_push($result, [
                'date' => $start_date,
                'day_name' => Carbon::parse($start_date)->formate('1'),
            ]);
            $start_date = date("Y-m-d", strtotime("+" . $increasing . " days", strtotime($start_date)));
        }
        return view('Event.show', [
            'event' => $event,
            'result' => $result,
            'total' => $total,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
