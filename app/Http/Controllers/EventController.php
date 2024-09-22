<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index ()
    {
        return view('event');
    }

    public function store(EventRequest $request)
    {
        $evnet                  = new Event();
        $evnet->name            = $request->name;
        $evnet->description     = $request->description;
        $evnet->avaiable_seat   = $request->avaiable_seat;
        $evnet->total_seat      = $request->total_seat;
        $evnet->date            = $request->date;
        $evnet->save();

        return redirect()->back()->with('success', 'Event created successfully');
    }
}
