<?php


namespace App\Classes;


abstract class WorkingTower
{
    public $husk = [];
    public $soil = [];

    abstract protected function purification(array $feedstock);


    abstract protected function getHusk();

    abstract protected function getSoil();

}