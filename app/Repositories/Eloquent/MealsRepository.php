<?php

namespace App\Repositories\Eloquent;

use App\Meal;


use App\Contracts\mealsInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;



//stari
/*class MealsRepository implements mealsInterface {

    use SoftDeletes;
    private $meals;

    public function __construct(Meal $meals)
    {
        $this->meals = $meals;
    }


    public function selectAll() {

        //$request = $request->all();

        //$meals = Meal::all();

        $this->meals->all();

        return $this->meals;

    }


    public function setLang( $request) {

        $language_id = isset($request['lang']) ? $request['lang'] : 3;
        //$meals = Meal::where('language_id', $language_id);
        $this->meals->find($language_id);

        return $this->meals;
    }

    public function checkId($request) {

        if($request->has('id')) {

            //$meals->where('id', $request->input('id'));
            //$meals = Meal::find($request->id);

            $this->meals->find($request['id']);
            return $this->meals;
        }
    }
    public function checkCat($request)
    {
        if (isset($request['category'])) {

            if (is_numeric($request['category'])) {

                $this->meals->where('category_id', $request['category']);
            } elseif ($request['category'] == 'NULL') {

                $this->meals->whereNull('category_id');
            } elseif ($request['category'] == '!NULL') {

                $this->meals->whereNotNull('category_id');
            }
        }
    }
    public function checkTag($request) {

        if(isset($request['tags'])) {

            $tag=explode(',', $request['tags']);
            $this->meals->join('meal_tag', 'meals.id', '=', 'meal_tag.meal_id');
            $this->meals->wherein('meal_tag.tag_id', $tag);
        }
    }
    public function checkWith($request) {

        if(isset($request['with'])) {

            $kljucne = explode(',', $request['with']);
            $keywords = array('category', 'ingredient', 'tag');

            foreach ($kljucne as $x) {

                if (in_array($x, $keywords, true)) {

                    $this->meals->with($x);
                }
            }
        }
    }
    public function checkDiff_time($request) {

        if(isset($request['diff_time'])) {

            $time=$request['diff_time'];

            if( is_int($request['diff_time'] > 0)){

                $this->meals->where('updated_at','>', $time)
                    ->orWhere('created_at','>', $time)
                    ->orWhere('deleted_at','>', $time)->withTrashed();
            }else{
                $this->meals->where('updated_at','>', $time);
            }
        }
    }
    public function checkPerP($request) {

        if(isset($request['per_page'])) {

            $this->meals->paginate($request['per_page']);
        }
    }
    public function returnResults($meals) {

        $meals = $meals->get();
        return response()->json([

            'data' => $meals,
        ]);
    }


}*/

//endStari

    class MealsRepository implements mealsInterface {
        /**
         * @var Meal
         */
        public $meal;
        public $para;


        /**
         * MealsRepository constructor.
         * @param Meal $meals
         */
        public function __construct(Meal $meal, Request $request )
        {
            $this->meal = $meal;
            $para = $request->all();
            return $para;
        }

        public function selectAll()
        {
            $this->meal->all();
            
            $language_id = isset($para['lang']) ? $para['lang'] : 3;
            return $this->meal->where('language_id',$language_id);
        }

        public function setLang()
        {
            //$langid
            $language_id = isset($para['lang']) ? $para['lang'] : 3;
            return $this->meal->where('language_id',$language_id);
        }

        public function checkId($id)
        {
            return $this->meal->findOrFail($id);
        }

        public function checkCat($catid)
        {
            return $this->meal->where('category_id', $catid);
        }

        public function checkTag($tagid)
        {
            return $this->meal->where('category_id', $tagid);
        }

        public function checkWith(array $with)
        {
            // TODO: Implement checkWith() method.
        }

        public function checkDiff_time($timeD)
        {
            // TODO: Implement checkDiff_time() method.
        }

        public function checkPerP($perP)
        {
            // TODO: Implement checkPerP() method.
        }

        public function returnResults($meals)
        {
            // TODO: Implement returnResults() method.
        }
    }

?>