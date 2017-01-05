<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB;

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
        return view('dashboard.user.vue');
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
        $events = Event::where('owner', $user_id)->get();
        return response()->json(["ownedEvents" => $events]);
    }

    /**
     * Get events user is attending
     */
    public function getAttendingEvents()
    {
        $user_id = Auth::user()->id;

        // gets array of event id's that the user is attending
        $event_ids = DB::table('event_user')->where('user_id', $user_id)->pluck('event_id')->toArray();
        // pull the events being attended by the user
        $events = DB::table('events')->whereIn('id', $event_ids)->get();

        return response()->json(["attendingEvents" => $events]);
    }

    /**
     * Get users attending the passed in event
     */
    public function getAttendingUsers(Request $request)
    {

    }
}