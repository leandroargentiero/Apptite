<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $meals = DB::table('meals')->where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
        return view('users.mymeals')
            ->with(compact("meals"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //naam van het model/fieldname
            'meal_name' => 'required|max:255',
            'description' => 'required',
            'available_places' => 'required',
            'kitchen' => 'required|max:255',
            'price' => 'required',
            'mealpicture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if($request->hasFile('mealpicture')){
            $mealpicture = $request->file('mealpicture');
            $filename = time() . '.' . $mealpicture->getClientOriginalExtension();
            Image::make($mealpicture)->fit(500, 500)->save( public_path('mealpictures/' . $filename ) );

            $data['successMessage'] = "Volgend gerecht werd aan uw menu toegevoegd:";
        }


        //  $request->name is de string vanuit het inputveld
        $request->user()->meals()->create([
            'meal_name' => $request->meal_name,
            'description' => $request->description,
            'available_places' => $request->available_places,
            'kitchen' => $request->kitchen,
            'price' => $request->price,
            'meal_picture' => $filename,
        ]);

        $data['mealname'] = $request->meal_name;
        $data['mealdescription'] = $request->description;
        $data['mealplaces'] = $request->available_places;
        $data['mealprice'] = $request->price;

        return view('meals/create')->with($data);


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
