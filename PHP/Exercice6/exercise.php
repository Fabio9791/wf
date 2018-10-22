<?php

function easterReverse(){
    $res=fopen('file.txt','r+');
    $fileContent = fread($res, filesize('file.txt'));
    $reverseContent=substr($fileContent,floor(strlen($fileContent) / 2));
    $correctContent = strrev($reverseContent);
    
    fseek($res,floor(strlen($fileContent) / 2),SEEK_SET);
    fwrite($res,$correctContent);
    echo $res;
    
    
    /*for($i=floor(strlen($fileContent) / 2); strlen($fileContent); $i--){
       $reverseContent.=
       fseek('file.txt',-1,SEEK_CUR);
    }*/

    //fseek('file.txt',floor(strlen($fileContent) / 2),SEEK_END);
    
    
    //echo $fileContent;
    //fwrite('file.txt',);
}

easterReverse();