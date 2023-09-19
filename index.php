<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="login/style/style.css">
    <?php
    if((isset($_GET['action']) && $_GET['action'] == "deconnection"))
    {session_start();
      session_destroy();
    }
    ?>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form method="post" action="login/inscription.php">
          <h1>Cree un compte</h1>
          <input type="text" placeholder="Pseudo"  name="pseudo" maxlength="20"
          placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" 
          title="caractères acceptés : a-zA-Z0-9-_." required="required" />
          <input type="password" placeholder="Password"  id="mdp" name="mdp" required="required"/>
          <input type="text" placeholder="Nom" required  id="nom" name="nom"/>
          <input type="text" placeholder="Prenom" required id="prenom" name="prenom" />
          <input type="email" placeholder="Email" required id="email" name="email"/>
          <input type="text" placeholder="Ville" required  pattern="[a-zA-Z0-9-_.]{2,15}" title="caractères acceptés : a-zA-Z0-9-_." id="ville" name="ville"/>
          <input type="text" placeholder="Adresse" required  pattern="[a-zA-Z0-9-_.]{2,15}" title="caractères acceptés : a-zA-Z0-9-_." id="code_postal" name="code_postal" />
          <input type="text" placeholder="Code Postal" required pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_." id="adresse" name="adresse"/>
          <input name="inscription" value="S'inscrire" type="submit" class="button">
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form method="post" action="">
          <a href="login/logAdmin.php" ><input type="button" value="Je suis Admin" class="button"/></a>
          <a href="login/logUser.php" ><input type="button" value="Je suis Client" class="button"/></a>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>content de te revoir!</h1>
            <p>
              Veuillez vous connecter à votre  <strong>Les-Trois-Freres!</strong> compte avec votre
              Informations personnelles
            </p>
            <button class="ghost" id="signIn">Se connecter</button>
          </div>

          <div class="overlay-panel overlay-right">
            <h1>Salut,Friend!</h1>
            <p>
              Entrer vos personnel information 
              C’est rapide et facile.
              <strong>Les-Trois-Freres!</strong> compte
            </p>
            <button class="ghost" id="signUp">S'inscrire</button>
          </div>
        </div>
      </div>
    </div>


    <script>const signUpBtn = document.getElementById('signUp'),
      signInBtn = document.getElementById('signIn'),
      container = document.getElementById('container');
    
    signUpBtn.addEventListener('click', () => {
      container.classList.add('right-panel-active');
    });

    signInBtn.addEventListener('click', () => {
      container.classList.remove('right-panel-active');
    });</script>
  </body>
</html>