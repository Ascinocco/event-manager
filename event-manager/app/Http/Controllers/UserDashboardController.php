<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Event;

class UserDashboardController extends Controller
{
    /**
     * New controller with auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Load initial dashboard page
     */
    public function index()
    {
        return view('dashboard.user.index');
    }

    /**
     * Create Event
     */
    public function createEvent(Request $request)
    {
        // validate event data
        $this->validate($request, [
            'title'         => 'name|required|max:255',
            'description'   => 'required',
            'location'      => 'required',
            'attire'        => 'required',
            'date'          => 'date',
        ]);

        // create event
        $event = new Event();
        $event->title       = $request->input('title');
        $event->description = $request->input('description');
        $event->location    = $request->input('location');
        $event->attire      = $request->input('attire');
        $event->date        = $request->input('date');
        $event->owner       = Auth::user()->id;

        // save event
        if ($event->save()) {
            return [
                'success'   => true,
                'msg'       => 'Event Created!',
                'event'     => $event,
                'request'   => $request,
            ];
        } else {
            return [
                'error' => true,
                'msg'   => 'Failed to create event. Please try again.',
                'event' => $event,
                'request' => $request,
            ];
        }
    }

    /**
     * Get events user owns
     */
    public function getOwnedEvents()
    {
        $user_id = Auth::user()->id;
        $events = Event::all()->where('owner', $user_id);
        return response()->json($events);
    }

    /**
     * Get events user is attending
     */
    public function getAttendingEvents()
    {

    }
}