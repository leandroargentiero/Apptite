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
        $curl     = new \Ivory\HttpAdapter\CurlHttpAdapter();
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);

        // GET ALL USERS INFO FOREACH EVENT
        $eventMeals = DB::table('users')
            ->join('meals', 'user_id', '=','users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->select('*')
            ->orderBy('events.event_date', 'desc')
            ->get();

        // SETUP GOOGLE MAP ON MECHELEN CENTRE
        Mapper::map(51.0282, 4.4804, ['zoom' => 15, 'marker' => false]);

        // ITEREATE ALL EVENTS
        foreach($eventMeals as $eventMeal){
            $coordinates = $geocoder->geocode($eventMeal->address);
            $long = $coordinates->get(0)->getLongitude();
            $lat = $coordinates->get(0)->getLatitude();
            Mapper::marker($lat, $long);
        }

        return view('events.index')
            ->with('eventMeals', $eventMeals)
            ->with('pagetitle', 'Apptite momenten')
            ->with('map');
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

        return view('events.eventdetail');
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
