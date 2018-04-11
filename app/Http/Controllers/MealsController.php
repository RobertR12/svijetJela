<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $para = $request->all();

        $language_id = isset($para['language_id']) ? $para['language_id'] : 3;

        $meals = Meal::where('language_id', $language_id);

        //dd($meals);

        if($request->has('id')) {

            $meals->where('id', $request->input('id'))->get();

        }


        if (isset($para['category'])) {

            if (is_numeric($para['category'])) {

                $meals->where('category_id', $para['category']);
            } elseif ($para['category'] == 'NULL') {

                $meals->whereNull('category_id');
            } elseif ($para['category'] == '!NULL') {

                $meals->whereNotNull('category_id');
            }
        }

       /* if (isset($params['with']))[


        ]*/



        $meals = $meals->get();
        return response()->json([

            'data' => $meals,

        ]);







       /* $meals = Meal::all();

        dd($meals);

        // return view and pass in the above variable

        return view('user.index')->with('users', $users);*/




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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
