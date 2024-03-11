<?php
require "../config.php";

try{
    $PDOConnect = new PDO(
        MY_DB_DRIVER . ":host=" . MY_DB_HOST . ";port=" . MY_DB_PIG . ";dbname=" . MY_DB_NAME . ";charset=" . MY_DB_CHARSET,
        MY_DB_USER,
        MY_DB_PASS
    );
}catch(Exception $e){
    die($e->getMessage());
}

$sql = "SELECT * FROM countries";
$query = $PDOConnect->query($sql);
$nbPays = $query->rowCount();

if($nbPays !== 0)
    $allCountries = $query->fetchAll(PDO::FETCH_ASSOC);
else $allCountries = [];

$query->closeCursor();
$PDOConnect = null;

include_once "../view/homepage.view.php";


//var_dump($PDOConnect, $query, $nbPays);