<?php
namespace App\Contracts;



interface mealsInterface {

    public function selectAll();
    //public function setLang();
    public function checkId($id);
    public function checkCat($catid);
    public function checkTag($tagid);
    public function checkWith(array $with);
    public function checkDiff_time($timeD);
    public function checkPerP($perP);
    public function returnResults($meals);
}




?>