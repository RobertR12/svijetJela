<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Meal;
use App\Contracts\mealsInterface;
use App\Repositories\Eloquent\MealsRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealsController extends Controller
{

    private $meals;
    public $para;

    public function __construct(MealsRepository $meals) {

        $this->meal = $meals;



        //dd("nesto");
       //dd( $this->meals);
        return $meals;
    }

    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $para = $request->all();

        $meals = $this->meal->selectAll();
        $meals1 = $this->meal->setLang();
        //$this->meal->setLang($request->has('lang'));
        //dd($meals);
        //$this->meals->setLang();


        //$meals = $this->meals;

        /*public function getAllMeals() {

            return $this->meals->selectAll();
    }
        public function getById () {

            return $this->meals->checkId($para[])
    }*/



        //staro
        /*$para = $request->all();
        //dd($request);
        $meals =$this->meals->selectAll($request);

        $this->meals->setLang($request['language_id']);

        //$this->meals->setLang($meals, $request);
        //$meals = $this->meals->setLang($request->input('lang'));

        //dd($meals2);

        //dd($meals);

        //nz kak da primjenim setLang funkciju nad $meals i tako da  se poziva svaka funkcija
        //iz repo kako bi se provjerilo jel postoji query uvijet i da se nadodaju uvijeti
        //$meals = $meals->setLang($request);*/

        //endStaro




        return response()->json([

            'data' => $meals,
            'data2' => $meals1,

        ]);
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
        //
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
