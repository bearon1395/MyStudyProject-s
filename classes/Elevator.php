<?php


namespace App\Classes;


class Elevator
{
    //Raw material
    private $raw;
    private $storageBin = [];
    private $totalSpace;

    private $workingTower;
    private $wheatDryer;

    private $husk;
    private $soil;

    public function __construct($raw, $workingTower, $wheatDryer)
    {
        $this->raw = $raw;
        $this->workingTower = $workingTower;
        $this->wheatDryer = $wheatDryer;
    }

    public function setStorageBinSpace($space)
    {
        $this->storageBin[] = new StorageBin($space);
    }

    public function getStorageBin($number)
    {
        $driedRaw = [];
        $i = $number-1;
        if(isset($this->storageBin[$i])){
            $driedRaw[] = $this->storageBin[$i];
            return $driedRaw;
        } else
            throw new \Exception('This Storage Bin doesn\'t exist. ');
    }


    //Main Function
    public function startConveyor()
    {
        //Check the weight to start the Elevator.
        $this->rawChecking();

        //1. Raw cleaning.
        $WorkingTower = $this->workingTower;

        echo "1) Raw cleaning:</br>";
        echo "Refined wheat:</br>";

        $cleanRaw = $this->rawCleaning();
        var_dump($cleanRaw);
        //-------
        echo  "Waste products:";
        var_dump($this->husk);
        var_dump($this->soil);
        //--------


        //2. Raw Drying.
        echo "2. Raw Drying:<br/>";
        echo "Dried wheat:</br>";

        $driedRaw = $this->rawDrying($cleanRaw);
        var_dump($driedRaw);


        //3. Filling storage bins with purified and dried raws.
        echo "<br/>3. Storage:<br/>";
        $storageBin = $this->storageBin;
        $this->rawStorage($driedRaw);

        for( $i = 0; $i < count($storageBin); $i++){
           echo "Storage bin №". ($i+1) .":";
            var_dump($storageBin[$i]->getRaw());
        }
    }


    public function rawChecking()
    {
        $storageBin = $this->storageBin;

        //Calculate the volume of all available storage space.
        for( $i = 0; $i < count($storageBin); $i++) {
            $this->totalSpace += $this->storageBin[$i]->getSpace();
        }

        //Check the weight to start the Elevator.
        $weightChecker = new WeightChecker();
        $weightChecker->check($this->raw, $this->totalSpace);
        if ($weightChecker == true) {
            echo "<br/>Weight check passed.<br/>";
        } else{
            throw new \Exception('Weight check failed.');
        }
    }

    public function rawCleaning()
    {
        $WorkingTower = $this->workingTower;

        //Start purification
        $cleanRaw = $WorkingTower->purification($this->raw);

        //Set waste products
        $this->husk = $WorkingTower->getHusk();
        $this->soil = $WorkingTower->getSoil();
        return $cleanRaw;
    }

    public function rawDrying($cleanRaw)
    {
        //Start Wheat Dryer
        $wheatDryer = $this->wheatDryer;
        $wheatDryer->onFan();

        //Start drying
        $driedRaw = $wheatDryer->drying($cleanRaw);

        return $driedRaw;
    }

    public function rawStorage($driedRaw)
    {
        $storageBin = $this->storageBin;

        for( $i = 0; $i < count($storageBin); $i++){
            $space = $storageBin[$i]->getSpace();
            $sorter = new Sorter();
            $sortedRaw = $sorter->sort($driedRaw, $space);
            $storageBin[$i]->setRaw($sortedRaw);
            array_splice($driedRaw, 0, $space);
        }
    }
}





