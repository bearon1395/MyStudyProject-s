<?php


namespace App\Classes;


class WorkingTowerType1 extends WorkingTower
{
    public $husk = [];
    public $soil = [];
    /* Received Data:
     * raw
     *
     * Returned data:
     * wheat
     * waste products:
     * */

    public function purification(array $feedstock)
    {
        $raw = $feedstock;

        $cleanRaw = [];
        $husk = [];
        $soil = [];

        for ($i = 0; $i < count($raw); $i++){
            if ($raw[$i] === 'wheat'){
                $cleanRaw[] = $raw[$i];
            } elseif ($raw[$i] === 'husk') {
                $husk[] = $raw[$i];
            } elseif ($raw[$i] === 'soil'){
                $soil[] = $raw[$i];
            }
        }
        $this->husk = $husk;
        $this->soil = $soil;

        return $cleanRaw;

    }

    public function getHusk()
    {
        $husk = $this->husk;
        return $husk;
    }

    public function getSoil()
    {
        $soil = $this->soil;
        return $soil;
    }
}