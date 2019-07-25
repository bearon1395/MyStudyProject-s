<?php


namespace App\Classes;


class Transport
{
    private $cargo = [];

    public function getCargo()
    {
        return $this->cargo;
    }

    public function load(array $cargo)
    {
        $this->cargo = $cargo;
    }

    public function unload()
    {
        return $this->cargo;
    }
}