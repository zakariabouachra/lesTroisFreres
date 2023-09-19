<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Registration Successful Message Example</title>

    <meta name="author" content="Codeconvey" />
    <!-- Message Box CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="css/demo.css" />
	
</head>

<?php 
require_once("fonctions.php");
require_once("../../connexion.php");
session_start();
$contenu ='';

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
	   $_SESSION['panier']['id_produit'] = array();
	   $_SESSION['panier']['quantite'] = array();
	}
//------ajout du produit dans le panier------

	$position_produit = array_search($_GET['id_produit'],  $_SESSION['panier']['id_produit']); 
    if ($position_produit !== false)
    {
         $_SESSION['panier']['quantite'][$position_produit] += $_GET['quantite'] ;
    }
    else 
    {
        $_SESSION['panier']['id_produit'][] = $_GET['id_produit'];
        $_SESSION['panier']['quantite'][] = $_GET['quantite'];
    }}


	
$req="INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES (" . $_SESSION['user']['id'] . "," . montantTotal() . ", NOW())";
		$resultat=$conn->query($req);
		$id_commande = $conn->insert_id;
		
		
		for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
		{
			$req="INSERT INTO details_commande (id_commande, id_produit, quantite, prix)
			 VALUES ($id_commande, " . $_SESSION['panier']['id_produit'][$i] . "," . $_SESSION['panier']['quantite'][$i] . "," . $_SESSION['panier']['prix'][$i] . ")";
			
			$resultat=$conn->query($req);
			$x=$_SESSION['panier']['quantite'][$i];

			//-------mise a jour de stock dans la base de données-------------

			$req = "SELECT * FROM jeux WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i];
			$resultat=$conn->query($req);
			$produit = $resultat->fetch_assoc();
			$y=$produit['stock'];
		
			$req="UPDATE jeux set   stock=$y-$x WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i];
   			$res=$conn->query($req);

//----------------------

		}
		

$contenu .= '<header class="ScriptHeader">
   
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- partial:index.partial.html -->
<div id="card" class="animated fadeIn">
  <div id="upper-side">
    <?xml version="1.0" encoding="utf-8"?>
      <!-- Generator: Adobe Illustrator 17.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
      <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
      <svg version="1.1" id="checkmark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" xml:space="preserve">
        <path d="M131.583,92.152l-0.026-0.041c-0.713-1.118-2.197-1.447-3.316-0.734l-31.782,20.257l-4.74-12.65
	c-0.483-1.29-1.882-1.958-3.124-1.493l-0.045,0.017c-1.242,0.465-1.857,1.888-1.374,3.178l5.763,15.382
	c0.131,0.351,0.334,0.65,0.579,0.898c0.028,0.029,0.06,0.052,0.089,0.08c0.08,0.073,0.159,0.147,0.246,0.209
	c0.071,0.051,0.147,0.091,0.222,0.133c0.058,0.033,0.115,0.069,0.175,0.097c0.081,0.037,0.165,0.063,0.249,0.091
	c0.065,0.022,0.128,0.047,0.195,0.063c0.079,0.019,0.159,0.026,0.239,0.037c0.074,0.01,0.147,0.024,0.221,0.027
	c0.097,0.004,0.194-0.006,0.292-0.014c0.055-0.005,0.109-0.003,0.163-0.012c0.323-0.048,0.641-0.16,0.933-0.346l34.305-21.865
	C131.967,94.755,132.296,93.271,131.583,92.152z" />
        <circle fill="none" stroke="#ffffff" stroke-width="5" stroke-miterlimit="10" cx="109.486" cy="104.353" r="32.53" />
      </svg>
      <h3 id="status">
      Success
    </h3>
  </div>
  <div id="lower-side">
    <p id="message">
      Congratulations, Vous avez acheter l\'article avec Success.
      Merci pour votre commande. votre numéro de suivi est le '.$id_commande.'
    </p>
    <a href="../../Site/home.php" id="contBtn">Continue</a>
  </div>
</div>
<!-- partial -->
    		
           
    		</div>
		</div>
    </div>
</section>';

?>
<body>
		

<?php echo $contenu;
unset($_SESSION['panier']);?>

     


    <!-- Analytics -->

	</body>
</html>