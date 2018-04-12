<?php
    namespace App\Repositories\interfaces;

interface MealsInterface {

    public function getRequest();
    public function setLang();
    public function setModelMeals();
    public function checkId();
    public function checkCat();
    public function checkTag();
    public function checkWith();
    public function checkDiff_time();
    public function checkPerP();
    public function returnResults();
}


?>