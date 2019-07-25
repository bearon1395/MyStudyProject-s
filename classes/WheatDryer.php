<?php


namespace App\Classes;


abstract class WheatDryer
{
    public $air;
    public $cleanRaw = [];

    abstract function drying(array $cleanRaw);


    abstract function onFan();


    abstract function offFan();

}