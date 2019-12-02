<?php
session_start();
include_once('bdd.php');

?>
 <?php
//verifie si l'utilisateur existe et son mdp 
if(empty($_SESSION))
{
if(isset($_POST['id'])){	
$nom = $_POST['id'];

$requete = 'SELECT * FROM clients WHERE identifiants LIKE "'.$nom.'"';
$reponse = $bdd->query($requete);

//si information sont vrai -> page roulette
while ($donnees = $reponse->fetch())
{
if($nom == $donnees['identifiants'] && $_POST['mdp']==$donnees['mdp'])
{
$_SESSION['argent'] = $donnees['argent'];
$_SESSION['Utilisateur'] = $_POST['id'];
$_SESSION['identifiant'] = $donnees['id'];


header('Location: roulette.php');
}
else
{
echo 'Erreur! Personne inexistante dans la base de donnees!!!';
}
}
}
}

 ?>
 

<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <title>Connexion Roulette</title>
  <link rel="stylesheet" href="css.css">
 
 
 </head>
<body>
 
 <header>
  <h1>Connectez vous pour jouer à la roulette</h1>
 
 </header>
 <article>
 <section></br></br>

 <!--formulaire de connection-->
  <form name="connexion" method="post" action="connexion.php">
 
 <label for="id"> Entrez votre Identifiant: </label></br>
 <input type="text" name="id" placeholder="Identifiant"/></br></br>
  <label for="password"> Entrez votre Mot de passe: </label></br>
 <input type="password" name="mdp" placeholder="Mot de passe"/></br></br>
 
 
<!--bouton de connexion et efface le formulaire-->
 <input type="submit" id="connect" value="Connecter" name="Connect">
 <input type="reset" id="clear" value="Effacer" name="effacer"></br></br>
 </form>

 
 <form name="connexion" method="post" action="inscription.php">
 <label for="inscription"> Vous inscrire: </label>
 <input type="submit" id="inscription" value="Inscription" name="inscri">
 
</form></br></br>
 
 </section>
 </article>
 
 

 
 
 
</body>
</html>