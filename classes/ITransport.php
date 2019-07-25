<?php


namespace App\Classes;


interface ITransport
{
    public function load(array $cargo);

    public function unload();

}