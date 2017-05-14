<?php

namespace App\Http\Controllers;

use App\Event;
use App\Mail\CancelReservation;
use App\Mail\NewReservation;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;

        // GET EVENT + MEAL + USER INFO FROM EACH RESERVATION
        $reservations = DB::table('users')
            ->join('meals', 'user_id', '=', 'users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->join('reservations', 'reservations.event_id', '=', 'events.id')
            ->where('reservations.user_id', '=', $userID)
            ->select('users.id as user_id','event_id', 'event_date', 'reservation_places', 'name', 'meal_name', 'reservations.id')
            ->get();

        $currentDate = Carbon::now()->format('d-m-Y');

        return view ('reservations.index')
            ->with('pagetitle', 'Mijn reservaties')
            ->with('reservations', $reservations)
            ->with('currentdate', $currentDate);
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
        $reservationAmount = $request->get('selReservation');
        $userID = Auth::user()->id;
        $eventID = $request->event_id;
        $availableplaces = $request->available_places;

        // STORE NEW RESERVATION
        $reservation = new Reservation();
        $reservation->user_id = $userID;
        $reservation->event_id = $eventID;
        $reservation->reservation_places = $reservationAmount;
        $reservation->save();

        // UPDATE EVENT AVAILABLE PLACES
        if($availableplaces >= 1){
            $newAvailableplaces = $availableplaces - $reservationAmount;

            DB::table('events')
                ->where('id', $eventID)
                ->update(['event_places' => $newAvailableplaces]);
        }


        // GET RECIPIENT FOR MAIL
        $recipient = DB::table('users')
            ->join('meals', 'user_id', '=', 'users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->join('reservations', 'reservations.event_id', '=', 'events.id')
            ->where('reservations.user_id', '=', $userID)
            ->select('*')
            ->first();

        // SEND CONFIRMATION MAIL TO ORGANIZER
        Mail::to($recipient)->send(new NewReservation());


        return Redirect::to('/mijnreservaties')
            ->with('successmessage', 'Hoera! Je heb een nieuwe reservatie geplaatst.');;;

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
        $eventID = DB::table('reservations')->where('id', '=', $id)->value('event_id');
        // GET RECIPIENT FOR MAIL
        $recipient = DB::table('users')
            ->join('meals', 'user_id', '=', 'users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->join('reservations', 'reservations.event_id', '=', 'events.id')
            ->where('reservations.event_id', '=', $eventID)
            ->select('*')
            ->first();

        // SEND CONFIRMATION MAIL TO ORGANIZER
        Mail::to($recipient)->send(new CancelReservation());

        dd($recipient);
        // GET RESERVATION PLACES
        $reservationPlaces = DB::table('reservations')->where('id', '=', $id)->value('reservation_places');

        // UPDATE EVENT AVAILABLE PLACES
        $eventID = DB::table('reservations')->where('id', '=', $id)->value('event_id');
        DB::table('events')
            ->where('id', '=', $eventID)
            ->increment('event_places', $reservationPlaces);

        // DELETE RESERVATION RECORD
        DB::table('reservations')->where('id', '=', $id)->delete();


        return Redirect::to('/mijnreservaties')
            ->with('successmessage', 'Het moment werd succesvol geannuleerd.');;

    }
}
