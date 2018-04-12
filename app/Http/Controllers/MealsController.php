<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealsController extends Controller
{

    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $para = $request->all();
        $language_id = isset($para['lang']) ? $para['lang'] : 3;
        $meals = Meal::where('language_id', $language_id);

        //dd($meals);

        if($request->has('id')) {

            $meals->where('id', $request->input('id'));
        }

        /*$ppage = isset($para['per_page']) ? $para['per_page'] : 5 ;
        $meals = $meals->paginate($ppage);*/

        if(isset($para['per_page'])) {

            $meals->paginate($para['per_page']);
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

        if(isset($para['tags'])) {

            $tag=explode(',', $para['tags']);
            $meals->join('meal_tag', 'meals.id', '=', 'meal_tag.meal_id');
            $meals->wherein('meal_tag.tag_id', $tag);
        }

        if(isset($para['with'])) {

            $kljucne = explode(',', $para['with']);
            $keywords = array('category', 'ingredient', 'tag');

            foreach ($kljucne as $x) {

                if (in_array($x, $keywords, true)) {

                    $meals->with($x);
                }
            }
        }
        if(isset($para['diff_time'])) {

            $time=$para['diff_time'];

            if( is_int($para['diff_time'] > 0)){

                $meals->where('updated_at','>', $time)
                    ->orWhere('created_at','>', $time)
                    ->orWhere('deleted_at','>', $time)->withTrashed();
            }else{
                $meals->where('updated_at','>', $time);
        }
        }

        $meals = $meals->get();
        return response()->json([

            'data' => $meals,
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
