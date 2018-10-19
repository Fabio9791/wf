<?php
/*$date = new DateTime('first monday of  at midnight');
$lastDate = new DateTime('last day of the current month');

$date->add(new DateInterval('+1day'));
$dateAsString = $date->format('Y-m-d H:i:s');*/ 

function getAllMondaysOfMonth($year,$month) {
    $date = DateTime::createFromFormat('Yn', $year.$month);
    $date = new DateTime('first day of '.$date->format('F Y'));
    $allmondays=[];
    while($date->format('m')==$month){
        if($date->format('N')==1){
            array_push($allmondays, $date->format('l j, M Y'));
        }
        $date->add(DateInterval::createFromDateString('next monday'));
    }
    return $allmondays;
   // var_dump($allmondays);
}

//getAllMondaysOfMonth(2018, 07);
