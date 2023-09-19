<?php
if(isset($_GET['action']) && $_GET['action'] == "deconnection"){
  session_start();
  session_destroy();
}
require_once("../connexion.php");
require_once("../login/style/style.php");
$output='';
if($_POST)
{
        $req = "SELECT * FROM user WHERE pseudo='$_POST[pseudo]'"; 
        $res=$conn->query($req);
    if($res->num_rows > 0)
    {
      $output .= '  <div class="container" id="container">
           <form method="post" action="logUser.php">
              <h1>Oops...! Vous etes deja inscrit.</h1>
              <input name="inscription" value="Se connecter" type="submit" class="button">
            </form>
        </div>';
        
    
    }
    else
    {
      
      $req= "INSERT INTO user (pseudo, password, nom, prenom, email,
      adresse, ville, cp) VALUES ('$_POST[pseudo]',
        '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', 
              '$_POST[adresse]', '$_POST[ville]', '$_POST[code_postal]')";
              $res=$conn->query($req);
              $output=' <div class="container" id="container">
              <form method="post" action="logUser.php">
                <h1>Parfait..! Inscription reussite</h1>
                <input name="inscription" value="Cliquez ici pour vous connecter" type="submit" class="button">
              </form>
          </div> ';
      
    }
  
}
echo $output;              
        ?> 