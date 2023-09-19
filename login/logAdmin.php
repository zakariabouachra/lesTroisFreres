<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="../login/style/style.css">
  </head>
  <?php
  if(isset($_GET['action']) && $_GET['action'] == "deconnection"){
  session_start();
  session_destroy();
}
?>
  <body>
    <div class="container" id="container">
    <a href="../index.php" class="previous round a">&laquo;</a>
      <form method="post" action="">
        <h1>Se connecter</h1>
          <input type="pseudo" placeholder="Votre pseudo" required id="pseudo" name="pseudo" />
          <input type="password" placeholder="Password" required id="mdp" name="mdp" />
          <input type="submit" value="Se connecter" class="button"/>
          <p>Forget password? <a href="#" style="color:orangered;">click here</a></p>
       <br>
</form>
</div>
  </body>


  <?php

 session_start();
 require_once("../connexion.php");
 require_once("../login/style/style.php");
 $output = '';
if($_POST)
{
    $req = "SELECT * FROM admin WHERE username='$_POST[pseudo]'";
    $resultat=$conn->query($req);
    if($resultat->num_rows != 0)
    {
        $admin = $resultat->fetch_assoc();
        if($admin['password'] == $_POST['mdp'])
        {
            foreach($admin as $indice => $element)
            {
                if($indice != 'password')
                {
                    $_SESSION['admin'][$indice] = $element;
                }
            }
            //header("location:../CRUD/accueil.php"); 
            header("location:../CRUD/affich_jeux.php?action=affichage"); 
        }
        else
        {
            echo '<div style=" color:red; font-size:20px; "><center>*Votre mots de passe est incorrect*</center></div>';
            /*$output .= '<div class="container" id="container">
            <form method="post" action="logAdmin.php">
              <h2>Votre mots de passe est incorrect.</h2>
              <input name="inscription" value="Ressayer" type="submit" class="button">
            </form>
        </div>';*/
        }       
    }
    else
    {
      echo '<div style=" color:red; font-size:20px; "><center>*Votre pseudo est incorrect ou n\'existe pas*</center></div>';
       /* $output .= '<div class="container" id="container">
        <form method="post" action="logAdmin.php">
          <h2>Votre pseudo est incorrect ou n\'existe pas </h2>
          <input name="inscription" value="Ressayer" type="submit" class="button">
        </form>
    </div>';*/
    }
    echo $output;
}

?>

</form>
</div>
</html>