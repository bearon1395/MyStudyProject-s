<?php


namespace App\Classes;


class Sorter
{
    public function sort(array $raw, $spaceStorage)
    {
        $space = $spaceStorage;
        $sortedRaw = $raw;

        $wheats = [];


        for ($i = 0; $i < $space; $i++) {
            if ($sortedRaw[$i] == null)
                break;
            else
                $wheats[] = $sortedRaw[$i];
        }

        return $wheats;
    }
}