<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="style.css">
	<style>
		.heading {
  font-size: 25px;
  font-weight: bold;
  color: orangered;
  border-bottom: 1px solid gray;
  padding: 20px ;
  display:flex;
  align-items: center;
  gap: 20px;
}

.heading ion-icon { font-size: 40px; }
	</style>
</head>
<body>
<script>
function increaseCount(a, b) {
var input = b.previousElementSibling;
var value = parseInt(input.value, 10);
value = isNaN(value) ? 0 : value;
value++;
input.value = value;
}

function decreaseCount(a, b) {
var input = b.nextElementSibling;
var value = parseInt(input.value, 10);
if (value > 1) {
value = isNaN(value) ? 0 : value;
value--;
input.value = value;
}
}
</script>
<?php
require_once("fonctions.php");
require_once("../connexion.php");
session_start();
$contenu='';
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AJOUT PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "ajouter_au_panier") 
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
	   $_SESSION['panier']['photo']= array() ;
	}
//------ajout du produit dans le panier------

	$position_produit = array_search($_GET['id_produit'],  $_SESSION['panier']['id_produit']); 
    if ($position_produit !== false)
    {
         $_SESSION['panier']['quantite'][$position_produit] += $_GET['quantite'] ;
    }
    else 
    {
        $_SESSION['panier']['titre'][] = $_GET['nom'];
        $_SESSION['panier']['id_produit'][] = $_GET['id_produit'];
        $_SESSION['panier']['quantite'][] = $_GET['quantite'];
		$_SESSION['panier']['prix'][] = $_GET['prix'];
    }}


//------------------
/*if(isset($_GET['action']) && $_GET['action'] == "update" ) 
{
	$position_produit = array_search($_GET['id_produit'],  $_SESSION['panier']['id_produit']); 
    if ($position_produit !== false)
    {
        $_SESSION['panier']['quantite'][$position_produit] = $_POST['newquantite'];

		//$_SESSION['panier']['newquantite'][$position_produit] += $_SESSION['panier']['quantite'][$position_produit] ;
    }
		
}*/
//----------------------------------------------
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

	//-----------

//--- VIDER PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "vider")
{
	unset($_SESSION['panier']);
}
//--- PAIEMENT ---//

if(isset($_POST['payer']))
{
	for($i=0 ;$i < count($_SESSION['panier']['id_produit']) ; $i++) 
	{
		$req = "SELECT * FROM jeux WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i];
		$resultat=$conn->query($req);
		$produit = $resultat->fetch_assoc();
		if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
		{
			if($produit['stock'] > 0)
			{
				$contenu .= '<div class="erreur">la quantité du produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été réduite car notre stock était insuffisant, veuillez vérifier vos achats.</div>';
				$_SESSION['panier']['quantite'][$i] = $produit['stock'];
			}
			else
			{
				$contenu .= '<div class="erreur">le produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été retiré de votre panier car nous sommes en rupture de stock, veuillez vérifier vos achats.</div>';
				retirerproduitDuPanier($_SESSION['panier']['id_produit'][$i]);
				$i--;
			}
			$contenu .= '<div class="erreur">Quantité demandée: ' . $_SESSION['panier']['quantite'][$i] . '</div>';
			$contenu .= '<hr /><div class="erreur">Stock Restant: ' . $produit['stock'] . '</div>';
			echo '<div id="popup1" class="overlay">
					<div class="popup">
						<h2 style="color:red">WARNING !</h2>
		  					<a class="close" href="#">&times;</a>
		  					<div class="content">'.$contenu.'</div>
		  			</div>
	  			</div>
				</div>';
			$erreur = true;
		}
	
	if(!isset($erreur))
	{

		echo '<div id="popup1" class="overlay">
					<div class="popup">
						<h2 ><a href="cart-paiement/index.php?&quantite='. $_SESSION['panier']['quantite'][$i] .'&id_produit=' . $_SESSION['panier']['id_produit'][$i] .'" style="color:green">Cliquez ici ! Pour payer... </a></h2>
		  					<a class="close" href="#">&times;</a>
		  			</div>
	  			</div>';
	}
}
}
		

//--------------------------------- AFFICHAGE HTML ---------------------------------//
echo ' <div class="heading">
<ion-icon name="cart-outline"></ion-icon> Shopping Cart
</div>';
echo '<div class="basket">
<div class="basket-labels">
  <ul>
	<li class="item item-heading">Item</li>
	<li class="price">Price</li>
	<li class="quantity">Quantity</li>
	<li class="subtotal"></li>
  </ul>
</div>
';
if(empty($_SESSION['panier']['id_produit'])) // panier vide
{
	echo "<label style='font-size:20px'>Votre panier est vide</label>";
	echo '<a href="../Site/shop.php" class="back" style="margin-bottom:5px"> Back To Shop</a>';

}
else
{
	for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) 
	{
		echo '<div class="basket-product">
        <div class="item">
          <div class="product-details">
            <h1><strong><span class="item-quantity">'. $_SESSION['panier']['titre'][$i] .'</strong>
          </div>
        </div>
        <div class="price">'. $_SESSION['panier']['prix'][$i] .'</div>
        <div class="quantity">'. $_SESSION['panier']['quantite'][$i] .' </div>
        <div class="remove">
		<a href="?action=retirer&id_produit=' . $_SESSION['panier']['id_produit'][$i] .'" class="fas fa-times"></a>
        </div>
      </div>';
	}
	echo '<a href="../Site/shop.php" class="back"> Back To Shop</a>';
	echo '<a href="?action=vider" class="vider">Vider mon panier</a>';
	
	echo '</div><aside>
	<div class="summary">
	  <div class="summary-total-items"><span class="total-items">'.count($_SESSION['panier']['id_produit']).'</span> Items in your Bag</div>
	  <div class="summary-total">
		<div class="total-title">Total</div>
		<div class="total-value final-value" id="basket-total">'. montantTotal() .'</div>
	  </div>';
	  if(internauteEstConnecte()) 
	{
	  echo '<div class="summary-checkout">
	  <form method="post" action="#popup1">
	  <div class="box">
	  <input id="btn" type="submit" name="payer" class="checkout-cta" value="Passer la commande">
  		</div>';
		echo '</form></div></div></aside>';
	}
	
}




?>




</body>

</html>
