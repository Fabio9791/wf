<?php

function easterReverse(){
    $res=fopen('file.txt','r+');
    $fileContent = fread($res, filesize('file.txt'));
    $reverseContent=substr($fileContent,floor(strlen($fileContent) / 2));
    $correctContent = strrev($reverseContent);
    
    fseek($res,floor(strlen($fileContent) / 2),SEEK_SET);
    fwrite($res,$correctContent);
    
    fclose($res);
}

easterReverse();