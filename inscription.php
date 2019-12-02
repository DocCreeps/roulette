<?php
session_start();
include_once('bdd.php');
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <title>Inscription roulette</title>
  <link rel="stylesheet" href="css.css">
 
 
 </head>
<body>
 
 <header>
  <h1>Inscrivez vous pour jouer à la roulette</h1>
 
 </header>
 <article>
 <section></br></br>
 <form name="connexion" method="post" action="inscription.php">
 <label for="id"> Entrez un Identifiant: </label></br>
 <input type="text" name="id" placeholder="Identifiant"/></br></br>
  <label for="password"> Entrez votre Mot de passe: </label></br>
 <input type="password" name="mdp" placeholder="Mot de passe"/></br></br>
  <label for="argent"> Argent de départ: </label></br>
 <input type="number" name="argent" placeholder="500" min="1"/></br></br>
 
 <input type="submit" id="connect" value="Inscription" name="Connect">
 <input type="reset" id="clear" value="Effacer" name="effacer"></br></br>
 </form></br>
 

 </section>
 </article>
 
 <?php


//verification que tous les champs comprennent des valeurs ou ont été valider 
	
	if(isset($_POST['Connect'])){
		// classRoulette roulette =new classRoulette;
//roulette.inscription();
				
			$db=mysqli_connect ('localhost', 'root', '', 'roulette');


if(!$db){
	exit("Echec de la connection");
}
 	else
	{
	echo 'Connexion réussie </br>';
} 	
	$sql= "INSERT INTO clients (id,identifiants,mdp,argent) VALUES(NULL,'$_POST[id]','$_POST[mdp]','$_POST[argent]')";
	$requete= mysqli_query($db,$sql);
	if($requete){		
	header('Location:connexion.php');		
	}

 
 }
 
 

?>

</body>

 
 
 
 
</html>

 	
 
 
 