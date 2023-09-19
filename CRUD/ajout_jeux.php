<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Mon Site</title>
    <link rel="stylesheet" href="../CRUD/style/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
    * {
      box-sizing: border-box;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      min-height: 100vh;
      margin: -20px 0 50px;
      background-color:#555;
      
    }
    h1 {
      font-weight: bold;
      margin: 0;
      color:orangered;
    }
    h2 {
      text-align: center;
    }
    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
    }
    span {
      font-size: 12px;
    }
    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
    }
    .button {
      border-radius: 20px;
      border: 1px solid orangered;
      background-color: orangered;
      color: #fff;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
    }
    .button:active {
      transform: scale(0.95);
    }
    .button:focus {
      outline: none;
    }
    .button.ghost {
      background-color: transparent;
      border-color: #fff;
    }
    form {
      background-image: linear-gradient(to top, white, #555 );
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }
    input , textarea , select {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
    }
    .container {
      background-image: linear-gradient(to top, white, #555 );
      /*background-color: #fff;*/
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
      position: relative;
      overflow: hidden;
      width: 780px;
      height: 500px;
      max-width: 100%;
      min-height: 480px;
    }
    .form-container {
      position: absolute;
      top: 0;
      height: 10%;
      transition: all 0.6s ease-in-out;
    }
    .sign-in-container {
      left: 0;
      width: 50%;
      z-index: 2;
    }
    .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
    }
    .sign-up-container {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }
    .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }
    @keyframes show {
      0%,
      49.99% {
        opacity: 0;
        z-index: 1;
      }
      50%,
      100% {
        opacity: 1;
        z-index: 5;
      }
    }
    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }
    .container.right-panel-active .overlay-container {
      transform: translateX(-100%);
    }
    .overlay {
      background: orangered;
      background: -webkit-linear-gradient(to right, orangered, orangered);
      background: linear-gradient(to right, orangered,orangered);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #fff;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }
    .container.right-panel-active .overlay {
      transform: translateX(50%);
    }
    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }
    .overlay-left {
      transform: translateX(-20%);
    }
    .container.right-panel-active .overlay-left {
      transform: translateX(0);
    }
    .overlay-right {
      right: 0;
      transform: translateX(0);
    }
    .container.right-panel-active .overlay-right {
      transform: translateX(20%);
    }
    
      </style>
</head>

<div class="container" id="container">
    
      <form method="post" enctype="multipart/form-data" action="affich_jeux.php">
        <h1> Formulaire de saisie des jeux </h1>
        <input type="text" id="categorie" name="categorie" placeholder="la categorie de produit" required>
        <input type="text" id="nom" name="nom" placeholder="le nom du produit" required>
        <textarea name="description" id="description" placeholder="la description du produit" required></textarea>
        
        <select name="type"placeholder="Type de console">
        <option value="PS5" >PS5</option>
            <option value="PS4">PS4</option>
            <option value="XBOX">XBOX</option>
            <option value="PC">PC</option>
        </select>
        <input type="file" id="photo" name="photo" required>
        <input type="text" id="prix" name="prix" placeholder="le prix du produit" required>
        <input type="text" id="stock" name="stock" placeholder="le stock du produit" required> 
        <input type="submit" value="enregistrement des jeux" class="button">  
      </form>
   

   



</body>
</html>

 
