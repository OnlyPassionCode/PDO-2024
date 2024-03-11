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

if(isset($_POST["num1"], $_POST["num2"]) && ctype_digit($_POST["num1"]) && ctype_digit($_POST["num2"])){
    $min = (int) $_POST["num1"];
    $max = (int) $_POST["num2"];
    if($min > $max){
        $max = (int) $_POST["num1"];
        $min = (int) $_POST["num2"];
    }
}else{
    $min = 1_000_000;
    $max = 10_000_000;
}

$sql = "SELECT `nom`, `population` FROM `countries` WHERE `population` BETWEEN :min AND :max ORDER BY `population` ASC";
$prepare = $PDOConnect->prepare($sql);
$prepare->bindValue(":min", $min, PDO::PARAM_INT);
$prepare->bindValue(":max", $max, PDO::PARAM_INT);
$prepare->execute();
$nbPays = $prepare->rowCount();

if($nbPays !== 0)
    $allCountries = $prepare->fetchAll(PDO::FETCH_ASSOC);
else $allCountries = [];

$prepare->closeCursor();
$PDOConnect = null;

include_once "../view/homepage.view.php";


//var_dump($PDOConnect, $prepare, $nbPays);