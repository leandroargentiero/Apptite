<?php

namespace App\Http\Controllers;

use App\Mail\NewReservation;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'review' => 'required',
        ]);

        $rating = $request->rating;
        $reviewtext = $request->review;
        $userID = $id;
        $reviewerID = Auth::id();

        // STORE NEW REVIEW
        $review = new Review();
        $review->user_id = $userID;
        $review->reviewer_id = $reviewerID;
        $review->review_description = $reviewtext;
        $review->review_rating = $rating;
        $review->save();

        // ========== SENDING CONFIRMATION MAIL TO USER ========
        // GET RECIPIENT FOR MAIL
        $recipient = DB::table('users')
            ->where('id', '=', $userID)
            ->select('*')
            ->first();

        // SEND CONFIRMATION MAIL TO ORGANIZER
        Mail::to($recipient)->send(new NewReview());
        //=======================================================


        return Redirect::to('/profiel/' . $userID);
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
