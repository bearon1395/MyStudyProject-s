<?php


namespace App\Classes;


class StorageBin implements IStorageBin
{
    private $space;

    public $raw = [];

    public function __construct($space)
    {
        $this->space = $space;
    }

    public function setRaw($raw)
    {
        $this->raw = $raw;
    }

    public function getRaw()
    {
        return $this->raw;
    }

    public function getSpace()
    {
        return $this->space;
    }

    public function unload($count)
    {
        if ($count <= count($this->raw)) {
            for ($i = 0; $i < $count; $i++) {
                $raw[] = $this->raw[$i];
            }
        }else
            throw new \Exception('Вы пытаетесь взять больше, чем имеется.');
        return array_splice($this->raw, 0, $count);
    }
}