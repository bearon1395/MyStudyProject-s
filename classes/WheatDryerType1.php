<?php


namespace App\Classes;


class WheatDryerType1 extends WheatDryer
{
    public $air;
    public $cleanRaw = [];

    public function drying(array $cleanRaw)
    {
        $this->cleanRaw = $cleanRaw;
        $driedRaw = [];
        for ($i=0; $i < count($this->cleanRaw); $i++) {
            //Check Fan(On,Off)
            if ($this->air === true){
                $dried = 'dried_' . $this->cleanRaw[$i];
            }else{
                $dried = 'notDried_' . $this->cleanRaw[$i];
            }
            $driedRaw[] = $dried;
        }



        return $driedRaw;
    }


    public function onFan()
    {
        $this->air = true;
    }

    public function offFan()
    {
        $this->air = false;
    }
}