<?php


namespace App\Classes;


abstract class WheatDryer
{
    public $air;
    public $cleanRaw = [];

    abstract protected function drying(array $cleanRaw);


    abstract protected function onFan();


    abstract protected function offFan();

}