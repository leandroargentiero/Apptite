<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET ALL USERS INFO FOREACH EVENT
        $eventMeals = DB::table('users')
            ->join('meals', 'user_id', '=','users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->select('*')
            ->orderBy('events.event_date', 'desc')
            ->get();

        return view('events.index')
            ->with('eventMeals', $eventMeals)
            ->with('pagetitle', 'Apptite momenten');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mealid = $request->meal_id;
        $eventdate = $request->event_date;

            $event = new Event();
            $event->event_date = $eventdate;
            $event->meal_id = $mealid;
            $event->save();


        return Redirect::to('events');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curl     = new \Ivory\HttpAdapter\CurlHttpAdapter();
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);

        $event = DB::table('events')
            ->join('meals', 'meals.id', '=','events.meal_id')
            ->join('users', 'users.id', '=', 'meals.user_id')
            ->where('events.id', '=', $id)
            ->select('*')
            ->first();

        // SETUP GOOGLE MAPS FOR USER/EVENT LOCATION
        $coordinates = $geocoder->geocode($event->address);
        $long = $coordinates->get(0)->getLongitude();
        $lat = $coordinates->get(0)->getLatitude();
        //Mapper::map($lat, $long)->informationWindow($lat, $long, 'Content', ['markers' => ['animation' => 'DROP']]);;

        Mapper::map($lat, $long, ['zoom' => 17, 'fullscreenControl' => false, 'center' => true, 'marker' => true, 'cluster' => false]);
        Mapper::informationWindow($lat, $long, $event->address. ',  ' . $event->postalcode . ' ' . $event->city);


        return view('events.eventdetail')
            ->with('event', $event)
            ->with('map');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
