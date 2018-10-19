<?php

$input;
$a=0;
$b=0;
$winner;
foreach($input as $round){
    if($round[0]>$round[1]){
        $a++;
    } elseif($round[1]>$round[0]){
        $b++;
    }
};
if($a>$b){
    $winner="A";
} else if($a<$b){
    $winner="B";
}
echo $winner;
