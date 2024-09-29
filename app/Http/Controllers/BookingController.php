<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index ()
    {
        $events = Event::query()->get();
        return view('booking', [
            'events'     => $events
        ]);
    }

    public function store(BookingRequest $request)
    {
        return DB::transaction(function() use ($request){

            $event = Event::findOrFail($request->event_id);
            if(!$event){
                return redirect()->back()->with('error', "Event is not available !");
            }

            if($event->avaiable_seat < $request->seat){
                return redirect()->back()->with('error', "This $request->seat are not available !");
            }

            $reamining_seats = $event->avaiable_seat - $request->seat;
            $event->avaiable_seat = $reamining_seats;
            $event->update();

            $booking            = new Booking();
            $booking->currency  = $request->currency;
            $booking->event_id  = $request->event_id;
            $booking->user_id   = Auth::user()->id;
            $booking->seat      = $request->seat;
            $booking->amount    = $request->amount;
            $booking->save();

            
            return redirect()->back()->with('success', 'Booking is created successfully');
       });
       
       return redirect()->back()->with('error', 'Booking is failed !');
    }
}
