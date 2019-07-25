<?php


namespace App\Classes;


class TransportFactory
{
    public function createLorry()
    {
        return new Lorry();
    }

    public function createFreightTrain()
    {
        return new FreightTrain();
    }
}