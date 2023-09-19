<?php
require_once("../connexion.php");
require_once("entete.php");
require_once("../CRUD/style/style.php");


$output='';




//--- INSERTION PRODUIT ---//
if(!empty($_POST))
{   
    $photo_bdd = ""; 
    if(!empty($_FILES['photo']['name']))
    {   
        $nom_photo = $_FILES['photo']['name'];
        
        $photo_bdd = "../CRUD/photos/" . $nom_photo;	

        $photo_dossier="C:/xampp/htdocs/projetF/CRUD/photos/".$nom_photo;
        copy($_FILES['photo']['tmp_name'],$photo_dossier);
          

    }
    
    $req="INSERT INTO jeux (categorie, nom ,description, type, photo,
     prix, stock) values ('$_POST[categorie]', '$_POST[nom]', '$_POST[description]', 
      '$_POST[type]',  '$photo_bdd',  '$_POST[prix]',  '$_POST[stock]')";
    $res=$conn->query($req);
    if ($res){echo '<div style="background: green; padding: 5px;"><center>l\'article a été  ajouté dans la base dans votre boutique en ligne</center></div>';
        $_GET['action'] = 'affichage';
    }
}
    
//--- SUPPRESSION PRODUIT ---//
if(isset($_GET['action']) && $_GET['action'] == "suppression")
{  
    $req ="DELETE FROM jeux WHERE id_produit=$_GET[id_produit]";
    $res=$conn->query($req);
    if ($res){
        echo '<div style="background: red; padding: 5px;"><center>l\'article a été  supprimé de la base données de votre boutique en ligne</center></div>';
        $_GET['action'] = 'affichage';
    }
}

    //--- AFFICHAGE PRODUITS ---//
if(isset($_GET['action']) && $_GET['action'] == "ajout")
{ header("location:ajout_jeux.php");}

elseif((isset($_GET['action']) && $_GET['action'] == "affichage")||(isset($_GET['action']) && $_GET['action'] == "supression"))
{
    $req = "SELECT * FROM jeux";
    $resultat=$conn->query($req);
 
    $output .= '<div class="container" id="container">';
    $output .= '<h2> Affichage des Produits </h2>';
    $output .= '<p>Nombre de produit(s) dans la boutique :' . $resultat->num_rows . ' </p>';
    $output .= '<table align="center" border="1px solid">';
    $output .= '<div class="mySidenav" class="sidenav">
    <a href="../CRUD/affich_jeux.php?action=affichage" class="projects">Afficher les jeux</a>
    <a href="../CRUD/ajout_jeux.php" class="contact">Ajouter des jeux</a>
  </div><tr>';
     
    while($colonne = $resultat->fetch_field())
    {    
        $output .= '<th>' . $colonne->name . '</th>';
    }
    $output .= '<th>Modification</th>';
    $output .= '<th>Supression</th>';
    $output .= '</tr>';
 
    while ($ligne = $resultat->fetch_assoc())
    {
        $output .= '<tr>';
        foreach ($ligne as $indice => $information)
        {
            if($indice == "photo")
            {
                $output .= '<td><img style="width:100px; height:100px;" src="' . $information . '" ></td>';
            }
            else
            {
                $output .= '<td>' . $information . '</td>';
            }
        }
        $output .= '<td><a href="update_jeux.php?action=modification&id_produit=' . $ligne['id_produit'] .'"><i class="far fa-edit" style="font-size:36px"></i></a></td>';
        $output .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] .'" OnClick="return(confirm(\'En êtes vous certain ?\'));"><i class="far fa-trash-alt" style="font-size:36px"></i></a></td>';
        $output .= '</tr>';

        
    }
    
    $output .= '</table></div><br><br>';
    $output .='<div class="topnav" style="height:50px;"> <b> <center> &copy; 2022 Les-Trois-Frere Corporation. All rights reserved.</center> </b></div>';
    
}


echo $output;





?>
