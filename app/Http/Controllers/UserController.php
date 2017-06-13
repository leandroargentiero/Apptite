<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('users.myprofile')
            ->with('user', $user)
            ->with('pagetitle', 'Mijn profiel');

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
        //
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

        $userID = $id;

        // GET ALL USER INFO
        $user = DB::table('users')
            ->where('id', '=', $userID)
            ->select('*')
            ->first();
        
        // GET ALL EVENTS FROM USER
        $totalEvents = DB::table('users')
            ->join('meals', 'user_id', '=', 'users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->where('users.id', '=', $userID)
            ->select('*')
            ->get();

        // GET ALL UPCOMING EVENTS
        $comingEvents = DB::table('users')
            ->join('meals', 'user_id', '=', 'users.id')
            ->join('events', 'meal_id', '=', 'meals.id')
            ->where('users.id', '=', $userID)
            ->where('events.event_date', '>=', Carbon::today()->toDateString())
            ->select('*')
            ->get();

        // GET ALL REVIEWS FOR THIS USER
        $reviews = DB::table('reviews')
            ->join('users', 'users.id', '=', 'reviews.reviewer_id')
            ->where('reviews.user_id', '=', $userID)
            ->select('*')
            ->get();

        // SETUP GOOGLE MAPS FOR USER/EVENT LOCATION
        $coordinates = $geocoder->geocode($user->address);
        $long = $coordinates->get(0)->getLongitude();
        $lat = $coordinates->get(0)->getLatitude();

        Mapper::map($lat, $long, ['zoom' => 17, 'fullscreenControl' => false, 'center' => true, 'marker' => true, 'cluster' => false]);
        Mapper::informationWindow($lat, $long, $user->address);

        return view('users.index')
            ->with('user', $user)
            ->with('map')
            ->with('totalevents', $totalEvents)
            ->with('comingevents', $comingEvents)
            ->with('reviews', $reviews);


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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            //naam van het model/fieldname
            'useravatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $bio = $request->userbio;
        $newPassword1 = $request->password1;
        $newPassword2 = $request->password2;
        $newEmail = $request->useremail;

        try {
            // UPDATE PROFILE PICTURE
            if ($request->hasFile('useravatar')) {
                $useravatar = $request->file('useravatar');
                $filename = time() . '.' . $useravatar->getClientOriginalExtension();
                Image::make($useravatar)->fit(300, 300)->save(public_path('avatars/' . $filename));

                $user->profilepic = $filename;
            }

            // UPDATE USER'S KITCHE/DINNER PLACE
            if ($request->hasFile('homepicture')) {
                $homepicture = $request->file('homepicture');
                $filename = time() . '.' . $homepicture->getClientOriginalExtension();
                Image::make($homepicture)->fit(1000, 300)->save(public_path('homepictures/' . $filename));

                $user->homepicture = $filename;
            }

            // UPDATE BIO DESCRIPTION
            if ($bio != null) {
                $user->description = $bio;

            }

            if (!empty($newPassword1) && !empty($newPassword2)) {
                if ($newPassword1 == $newPassword2) {
                    $request->user()->fill([
                        'password' => Hash::make($request->input("password"))
                    ])->save();

                    $newPassword = Hash::make($newPassword1);

                    $user->password = $newPassword;
                } else {
                    return redirect('/mijnprofiel')->with('errormessage', 'Opgepast! Wachtwoorden komen niet overeen. Gelieve nog eens te proberen');
                }
            }

            if ($newEmail != null) {
                $user->email = $newEmail;
            }

            $user->save();

        } catch (\Exception $e) {

            return redirect('/mijnprofiel')->with('errormessage', 'Woops! Er ging iets mis bij het wijzigen. Gelieve nog eens te proberen');
        }


        return redirect('/mijnprofiel')
            ->with('successmessage', 'Gefeliciteerd Apptiter! Je profiel werd succesvol gewijzigd.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
