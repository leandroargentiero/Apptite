<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->join('meals', 'user_id', '=', 'users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->select('*')
            ->where('events.event_date', '>=', Carbon::today()->toDateString())
            ->where('users.id', '=', Auth::id())
            ->orderBy('events.event_date', 'desc')
            ->get();

        // GET ALL RESERVATIONS
        $reservations = DB::table('reservations')
            ->join('users', 'users.id', '=', 'reservations.user_id')
            ->join('events', 'events.id', '=', 'reservations.event_id')
            ->select('*', 'reservations.id AS reservation_id')
            ->get();

        return view('events.mijnevents')
            ->with('eventMeals', $eventMeals)
            ->with('reservations', $reservations)
            ->with('pagetitle', 'Mijn Apptite events');
    }

    public function search(Request $request)
    {
        $searchCity = $request->txtPlace;

        // GET ALL EVENTS FOR KEYWORD = CITY
        $eventMeals = DB::table('users')
            ->join('meals', 'user_id', '=', 'users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->where('users.address', 'like', '%'.$searchCity.'%' )
            ->select('*')
            ->where('events.event_date', '>=', Carbon::today()->toDateString())
            ->orderBy('events.event_date', 'asc')
            ->get();

        return view('events.index')
            ->with('eventMeals', $eventMeals)
            ->with('searchCity', $searchCity)
            ->with('pagetitle', 'Apptite events');

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mealid = $request->meal_id;
        $eventdate = $request->event_date;
        $eventplaces = $request->available_places;

        $event = new Event();
        $event->event_date = $eventdate;
        $event->meal_id = $mealid;
        $event->event_places = $eventplaces;
        $event->save();


        return Redirect::to('/mijnevents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curl = new \Ivory\HttpAdapter\CurlHttpAdapter();
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);

        // GET ALL USER + MEAL INFO FOR THIS EVENT
        $event = DB::table('events')
            ->join('meals', 'meals.id', '=', 'events.meal_id')
            ->join('users', 'users.id', '=', 'meals.user_id')
            ->where('events.id', '=', $id)
            ->select('*')
            ->first();

        // THE SPECIFIC EVENT ID
        $eventID = $id;

        // SETUP GOOGLE MAPS FOR USER/EVENT LOCATION
        $coordinates = $geocoder->geocode($event->address);
        $long = $coordinates->get(0)->getLongitude();
        $lat = $coordinates->get(0)->getLatitude();

        Mapper::map($lat, $long, ['zoom' => 17, 'fullscreenControl' => false, 'center' => true, 'marker' => true, 'cluster' => false]);
        Mapper::informationWindow($lat, $long, $event->address);


        // GET ALL REVIEWS FOR THIS USER
        // FIRST THE USER ID FROM THIS EVENT
        $userID = DB::table('meals')
            ->join('events', 'events.meal_id', '=', 'meals.id')
            ->where('events.id', '=', $id)
            ->select('meals.user_id')
            ->value('user_id');


        // GET THE REVIEWS
        $reviews = DB::table('reviews')
            ->join('users', 'users.id', '=', 'reviews.reviewer_id')
            ->where('reviews.user_id', '=', $userID)
            ->select('*')
            ->get();

        // GET AVARAGE RATINGS
        $avgRating = DB::table('reviews')
            ->join('users', 'users.id', '=', 'reviews.reviewer_id')
            ->where('reviews.user_id', '=', $userID)
            ->avg('review_rating');

        $rating = ROUND($avgRating);

        return view('events.eventdetail')
            ->with('event', $event)
            ->with('eventID', $eventID)
            ->with('reviews', $reviews)
            ->with('avgRating', $rating)
            ->with('map');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $eventID = $id;

        $this->validate($request, [
            'meal_name' => 'required|string|max:255',
            'meal_description' => 'required|string',
            'available_places' => 'required|integer',
            'event_price' => 'required|integer',
        ]);

        // CUSTOM MESSAGES => VALIDATION.PHP

        $mealname = $request->meal_name;
        $mealdescription = $request->meal_description;
        $eventplaces = $request->available_places;
        $eventprice = $request->event_price;
        $eventdate = $request->event_date;

        $eventmealID = DB::table('events')
            ->where('id', '=', $eventID)
            ->value('meal_id');


        // UPDATE MEAL NAME
        if ($mealname != null && !empty($mealname)) {
            DB::table('meals')
                ->where('id', '=', $eventmealID)
                ->update(['meal_name' => $mealname]);
        }

        // UPDATE MEAL DESCRIPTION
        if ($mealdescription != null && !empty($mealdescription)) {
            DB::table('meals')
                ->where('id', '=', $eventmealID)
                ->update(['meal_description' => $mealdescription]);
        }

        // UPDATE EVENT PLACES
        if ($eventplaces != null && !empty($eventplaces)) {
            DB::table('events')
                ->where('id', '=', $eventID)
                ->update(['event_places' => $eventplaces]);
        }

        // UPDATE MEAL PRICE
        if ($eventplaces != null && !empty($eventplaces)) {
            DB::table('meals')
                ->where('id', '=', $eventmealID)
                ->update(['price' => $eventprice]);
        }

        // UPDATE EVENT DATE
        if ($eventdate != null && !empty($eventdate)) {
            DB::table('events')
                ->where('id', '=', $eventID)
                ->update(['event_date' => $eventdate]);
        }

        return Redirect::to('/events/' . $eventID)
            ->with('successmessage', 'Jouw event werd succesvol gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('events')->where('id', '=', $id)->delete();

        $user_id = Auth::id();
        $meals = DB::table('meals')->where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
        return redirect('/mijnkookboek')
            ->with(compact("meals"))
            ->with('successmsg', 'Het event werd succesvol verwijderd.')
            ->with('pagetitle', 'Mijn kookboek');

    }
}
