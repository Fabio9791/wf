<?php 

try{
    $DB=$config['DB'];
    $connection = new PDO(
        'mysql:host='.$DB['host'].';dbname='.$DB['name'],
        $DB['user'],
        $DB['password']
    );
} catch(PDOException $e){
    print "Error!: ".$e->getMessage()."<br/>";
    exit();
}
