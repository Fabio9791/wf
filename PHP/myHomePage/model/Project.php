<?php 

require __DIR__ . '/../model/connection.php';

function getAllProjects(){
    /**
     * @var PDO $connection
     */
    global $connection;
    $statement ='SELECT * FROM Project';
    $projects = $connection->query($statement);
    
    if($projects===false){
        throw new Exception($connection->errorCode());
    }
    
    return $projects;
}