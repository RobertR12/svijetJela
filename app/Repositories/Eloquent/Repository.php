<?php

namespace App\Repositories\Eloquent;

use App\Meal;


use App\Contracts\mealsInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\RepositoryException;
use Illuminate\Container\Container as App;


abstract class  Repository implements mealsInterface {

    private $app;

    protected $model;

    public function  __construct(App $app) {

        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    public function selectAll($request)
    {
        return $this->model->get();
    }

    public  function checkPerP($request)
    {
        return $this->model->paginate
    }

    public  function  makeModel() {

        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }
}





?>