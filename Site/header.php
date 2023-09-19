<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<!----------------------TRAITMENT PHP -------------------------->
<?php
require_once("../panier/fonctions.php");
require_once("../connexion.php");
session_start();
$contenu='';
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AJOUT PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "ajouter_au_panier" ||  $_GET['action'] == "quantite"  ) 
{	
	
	$req = "SELECT * FROM jeux WHERE id_produit='$_GET[id_produit]'";
	$resultat=$conn->query($req);
	$produit = $resultat->fetch_assoc();
	
	//------création du panier------

	if (!isset($_SESSION['panier']))
	{
	   $_SESSION['panier']=array();
	   $_SESSION['panier']['titre'] = array();
	   $_SESSION['panier']['id_produit'] = array();
	   $_SESSION['panier']['quantite'] = array();
	   $_SESSION['panier']['prix'] = array();
	}
//------ajout du produit dans le panier------

	$position_produit = array_search($_GET['id_produit'],  $_SESSION['panier']['id_produit']); 
    if ($position_produit !== false)
    {
         $_SESSION['panier']['quantite'][$position_produit] += $_POST['quantite'] ;
    }
    else 
    {
        $_SESSION['panier']['titre'][] = $_GET['nom'];
        $_SESSION['panier']['id_produit'][] = $_GET['id_produit'];
        $_SESSION['panier']['quantite'][] = $_POST['quantite'];
		$_SESSION['panier']['prix'][] = $_GET['prix'];
    }}


//------------------


if(isset($_GET['action']) && $_GET['action'] == "retirer")

{
	$position_produit = array_search($_GET['id_produit'],  $_SESSION['panier']['id_produit']);
	if ($position_produit !== false)
    {
		//supprimer un seul element dont l'indice est position produit
		array_splice($_SESSION['panier']['titre'], $position_produit, 1);
		array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
		array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
		array_splice($_SESSION['panier']['prix'], $position_produit, 1);
	}
}

//--------------------------------- AFFICHAGE HTML ---------------------------------//
$contenu ='';


if(empty($_SESSION['panier']['id_produit'])) // panier vide
{
    $contenu .='<h1>Votre panier est vide</h1>';
}
else
{	
    $contenu .= '<h2 style="text-align:center;">Vous avez <label style="color:orangered;" >'.count($_SESSION['panier']['id_produit']).'</label> articles<br> dans votre panier.</h2><br>';
    for($j = 0;$j < count($_SESSION['panier']['id_produit']); $j++)
    {
        $contenu .= '<div class="box">';
        $contenu .= '<a href="?action=retirer&id_produit=' . $_SESSION['panier']['id_produit'][$j] .'" class="fas fa-times"></a>';
        $contenu .= '<div class="content">';     
        $contenu .= '<h1>'. $_SESSION['panier']['titre'][$j] . "</h1>"; 
        $contenu .= '<h4> Quantite : ' . $_SESSION['panier']['quantite'][$j] . ' x '. $_SESSION['panier']['prix'][$j] .  " $</h4>";
        $contenu .= '</div>';  
        $contenu .= '</div>';
    }
    $contenu .= '<br>';

}


?>
<header class="header">

    <a href="home.php" class="logo"> <i class="fas fa-shopping-basket"></i> Les-Trois-Freres</a>

    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="shop.php">shop</a>
        <a href="Ps4.php">Ps4</a>
        <a href="Ps5.php">Ps5</a>
        <a href="Xbox.php">Xbox</a>
        <a href="PC.php">PC</a>
    
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fas fa-shopping-cart"></div>
        <div id="login-btn" class="fas fa-user"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart">

    <?php echo $contenu ?>

    <a href="../panier/panier.php" class="btn">Acceder au panier</a>
        
        <!--<div class="box">
            <i class="fas fa-times"></i>
            <img src="image/cart-1.jpg" alt="">
            <div class="content">
                <h3>organic food</h3>
                <span class="quantity">1</span>
                <span class="multiply">x</span>
                <span class="price">$18.99</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-times"></i>
            <img src="image/cart-2.jpg" alt="">
            <div class="content">
                <h3>organic food</h3>
                <span class="quantity">1</span>
                <span class="multiply">x</span>
                <span class="price">$18.99</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-times"></i>
            <img src="image/cart-3.jpg" alt="">
            <div class="content">
                <h3>organic food</h3>
                <span class="quantity">1</span>
                <span class="multiply">x</span>
                <span class="price">$18.99</span>
            </div>
        </div>
        <h3 class="total"> total : <span>56.97</span> </h3>
        <a href="#" class="btn">checkout cart</a>-->
    </div>

    
        <?php 
        //require_once("../connexion.php");
        //session_start();
        $output='';
        
        $output='<form action="../index.php" class="login-form">';
        $output .= '<div class="box"><p style="text-align:center;font-size:20px;">Bonjour <strong style="color: orangered">' . $_SESSION['user']['pseudo'] . '</strong></p>';
        $output .= '<p> Nom : ' . $_SESSION['user']['nom'] . '<br>';
        $output .= 'Prenom : ' . $_SESSION['user']['prenom'] . '<br>';
        $output .= 'Email: ' . $_SESSION['user']['email'] . '</p>' ;
        $output .= '<a href="../index.php?action=deconnection" class="btn">Se deconnecter</a>';
        $output .= ' <p>Change password? <a href="#">click here</a></p></div><br><br></form>';
       
        
        
        echo $output;
        ?>


</header>


<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>
