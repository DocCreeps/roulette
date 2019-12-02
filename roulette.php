<?php
include_once('bdd.php');
session_start();

?>

 <?php  
   //verif que les champs sois remplie et met les valeurs dans une variable
if(isset($_POST['jouer'])){
	//tire un nombre random entre 1 et 36 
$numero = rand(1,36);
if (isset($_POST["pariter"])) {
 $Choisir = $_POST["pariter"];
}
if (isset($_POST["Nombre"])){
 $Nombre = $_POST["Nombre"];
}
if(isset($_POST["Mise"])){
$Mise = $_POST["Mise"];}
if($Nombre>=1 && $Nombre<=36){
	
	
 if($Mise <= $_SESSION['argent']) {
	 if($Mise>0){
		 //enleve la mise a son solde
 $_SESSION['argent'] = $_SESSION['argent'] - $Mise;
  
  
  if ($numero%2 == 0) {
 ?>
 <!-- definie si le numero est paire ou impaire-->
 <h1><?php echo "Le nombre ".$numero. " est Pair ";?></h1>
 <?php
 }
 else{
 ?>
 <h1><?php echo "Le nombre ".$numero. " est Impair";?></h1>
 <?php
 }
 $profit=0;
 //verif le numero
 if(isset($Nombre)){
 if ($Nombre == $numero) {
 echo "Vous avez trouvé le nombre !";
 
 $_SESSION['argent'] = $_SESSION['argent'] + $Mise*35;
 $profit=$profit+ $Mise*35;
 }
 elseif ($Nombre != $numero) {
 echo "Vous n'avez pas trouver le nombre";
 $profit=$profit;
 }
 else
 {
 echo "Vous n'avez pas tenté de trouver le nombre !";
  $profit=$profit;
 }

 }
 //verif si paire /impaire 
 if (isset($_POST['pariter'])) {
	 
 if ($Choisir == "Pair" && $numero%2 == 0) {

 echo " Vous avez trouvé la parité !<br>";
 $_SESSION['argent'] = $_SESSION['argent'] + $Mise*2;
  $profit=$profit+ $Mise*2;}
 elseif ($Choisir == "Impair" && $numero%2 == 0) {
 echo " Vous n'avez pas trouvé la parité !<br>";
  $profit=$profit;}
 elseif ($Choisir == "Impair" && $numero%2 != 0) {
 echo " Vous avez trouvé la parité !<br>";
 $_SESSION['argent'] = $_SESSION['argent'] + $Mise*2;
$profit=$profit+ $Mise*2;}
elseif ($Choisir == "Pair" && $numero%2 != 0) {
 echo " Vous n'avez pas trouvé la parité ! <br>";
 $profit=$profit;}
 else
 {
 echo " Vous n'avez pas tenté de trouver la parité !<br>";
 $profit=$profit;}
 }
 //met a jour le solde du joueur
 $sql = "UPDATE clients SET argent = ".$_SESSION['argent']." WHERE identifiants = '".$_SESSION['Utilisateur']."';";
$bdd->query($sql);


//on récupere la date et l'heure de la partie
$datetime= new Datetime();
$date= $datetime->format("Y-m-d H:i:s");

 
 $idc= $_SESSION['identifiant'];

//var_dump($idc,$date,$Mise,$profit);
//requete sql pour rentrer les info de la partie

 $sql2="INSERT INTO game VALUES('".$idc."','".$date."','".$Mise."','".$profit."')";
$insegame=$bdd->query($sql2); 



 
 } else
{
echo "Vous n'avez pas assez d'argent pour miser !";
 }

}

}

}



//empeche qu'au refresh de la page la partie se joue toute seul a verif ou le placer car n'affiche pas le résultat

/*
if($insegame){
  
header('Location:roulette.php');


}

*/

?>



 <?php
 if(isset($_POST['Deco'])){
 //deconnexion  vide session
	$_SESSION = array();
  
 
 session_destroy();
 header('Location:connexion.php');
 }
?>



<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8">
  <title>La super ROULETTE</title>
  <link rel="stylesheet" href="css.css">
 
 
 </head>
<body>
 
 <header>
  <h1>Bienvenue sur le jeu de la roulette</h1>
 <?php
setlocale(LC_TIME,"fr_FR.UTF-8","fra");
echo strftime("Bonjour nous sommes le %A %d %B %Y", $_SERVER['REQUEST_TIME']);
?>
 </header>
 <section></br></br>
 <article>
 <?php
echo "<b> $_SESSION[Utilisateur] </b>";
echo "</br>Vous possédez: $_SESSION[argent] €";
 
 ?>
 </br></br>
 <form name="roulette" method="post" action="roulette.php"> 
 <label for="Mise"> Entrez une mise </label>
 <input type="text" name="Mise" placeholder="Votre Mise" min="1" max="36"/></br></br>
 </article>
 <article id="miser">
 
 
 
 
 
 </br><label for="Nombre"> Misez sur un nombre: </label>
 <input list="paris" type="text" name="Nombre" id="Paris" /></br></br>
  <datalist id="paris">
  <option value="1">
  <option value="2">
  <option value="3">
  <option value="4">
  <option value="5">
  <option value="6">
  <option value="7">
  <option value="8">
  <option value="9">
  <option value="10">
  <option value="11">
  <option value="12">
  <option value="13">
  <option value="14">
  <option value="15">
  <option value="16">
  <option value="17">
  <option value="18">
  <option value="19">
  <option value="20">
  <option value="21">
  <option value="22">
  <option value="23">
  <option value="24">
  <option value="25">
  <option value="26">
  <option value="27">
  <option value="28">
  <option value="29">
  <option value="30">
  <option value="31">
  <option value="32">
  <option value="33">
  <option value="34">
  <option value="35">
  <option value="36">
  </datalist>
  
 <label for="pariter">Choisisez une pariter:</label> </br>

 <label for="pair">Paire</label>
  <input type="radio" id="pair" name="pariter" value="Pair"  /></br>

 <label for="impair">Impaire</label>
  <input type="radio" id="impair" name="pariter" value="Impair"  /></br></br>




 </article>
 <article>


 </article>
 </br><input type="submit" id="play" value="Jouer" name="jouer"></br>
  </br> <a href="connexion.php?deco"><input type="submit" id="deco" value="Deconexion" name="Deco"></br></a>
  
 </section>
 
 
 </form>

</body>
</html>