<?php


namespace App\Classes;


abstract class WorkingTower
{
    public $husk = [];
    public $soil = [];

    abstract function purification(array $feedstock);


    abstract function getHusk();

    abstract function getSoil();

}