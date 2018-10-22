<?php
function divide(int $pDivide,int $pDivisor):int{
    if($pDivisor!=0){
        return $pDivide/$pDivisor;
    }else{
        throw new RuntimeException('Division by 0 is not allowed');
    }
}

function arrayDivide(array $pDivide,int $pDivisor):array{
    $array=[];
    try{
        foreach ($pDivide as $current){
            array_push($array,divide($current, $pDivisor));
        }
        return $array;
    } catch(RuntimeException $e){
        return $pDivide;
    }
    
}