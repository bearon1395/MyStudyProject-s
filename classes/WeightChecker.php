<?php


namespace App\Classes;


class WeightChecker
{

    public function check(array $raw, $space)
    {
        $check = null;
        $rawWeight = count($raw);
        $chkSpace = $space;
        if (floatval($rawWeight) > floatval($chkSpace)) {
//            echo "Сырья больше, чем доступного пространства для хранения.";
            echo "Raw materials are more than available storage space.";
            $check = false;
        } else
            $check = true;

        return $check;

    }
}