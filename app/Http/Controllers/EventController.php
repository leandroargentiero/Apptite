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
        // GET ALL MEAL INFO FOREACH EVENT
        $meals = DB::table('meals')
            ->join('events', 'events.meal_id', '=', 'meals.id')
            ->select('*')
            ->orderBy('events.event_date', 'desc')
            ->get();

        // GET ALL USERS INFO FOREACH EVENT
        $users = DB::table('users')
            ->join('meals', 'user_id', '=','users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->select('*')
            ->get();


        $map = Mapper::location('Mechelen')->map(['zoom' => 16]);



        return view('events.index')
            ->with('meals', $meals)
            ->with('pagetitle', 'Apptite momenten')
            ->with('map', $map);
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
        //
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
