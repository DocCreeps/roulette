<?php
//connection bdd
try
 {

  $bdd = new PDO ('mysql:host=localhost;dbname=roulette', 'root', '');

 }

 catch(Exception $e)
 {
  die('Erreur :'.$e->getMessage());
 }
 

?>

