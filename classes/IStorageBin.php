<?php


namespace App\Classes;


interface IStorageBin
{
    public function setRaw($raw);

    public function getRaw();

    public function getSpace();

    public function unload($count);
}