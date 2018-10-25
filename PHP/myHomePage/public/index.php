<?php

$config = include __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/Project.php';

try{
    $projects=getAllProjects();
}catch(Exception $e){
    echo 'An error occured with code : '.$e->getMessage();
    exit;
}

var_dump($projects->fetchAll());
/*include __DIR__ . '/../model/articles.php';
include __DIR__ . '/../view/articleList.php';*/
