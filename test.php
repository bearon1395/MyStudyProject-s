<?php
namespace App\Classes;
include ('autoloader.php');

// TESTING

//Setup

//wheat -зерно
//husk - шелуха
//soil - земля

//Input raw
$feedstock = ["wheat", "wheat", "wheat",
    "wheat", "soil", "wheat",
    "wheat", "wheat", "husk",
    "soil", "soil", "wheat",
    "husk", "wheat", "soil",
];

//Transport Factory
$transport = new TransportFactory();
//Create transport
$lorry = $transport->createLorry();
//Load transport
$lorry->load($feedstock);

//Unload transport
$raw = $lorry->unload();


//WorkingTowerFactory
$workingTowerFactory = new WorkingTowerFactory();
//Create WorkingTower
$workingTower = $workingTowerFactory->createWorkingTowerType1();

//WheatDryerFactory
$wheatDryerFactory = new WheatDryerFactory;
//Create WheatDryer
$wheatDryer = $wheatDryerFactory->createWheatDryerType1();


//Create Elevator with params.
$elevator = new Elevator($raw, $workingTower, $wheatDryer);
//Set Storage Bins with space
$elevator->setStorageBinSpace(4);
$elevator->setStorageBinSpace(3);
$elevator->setStorageBinSpace(14);
$elevator->setStorageBinSpace(14);


//--------------
//Start Elevator
$elevator->startConveyor();


echo "####################################"."<br/>";
echo "Additional check<br/>";

echo "Storage Bin #1 has:";
$storageBin = $elevator->getStorageBin(1);
var_dump($storageBin[0]->raw);

echo "Load Car.<br/>";
$lorry->load($storageBin);
echo "Car has:";
$lorryCargo = $lorry->getCargo();
var_dump($lorryCargo[0]->raw);


