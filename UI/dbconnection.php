<?php

try{

    $pdo = new PDO('mysql:host=localhost;dbname=prototype_db','root','');

}catch(PDOException $e ){

echo $e->getMessage();


}




//echo'connection success';




?>