<?php
require_once("../connexion.php");



    if(!empty($_FILES['photo']['name']))
    {   
        $nom_photo = $_FILES['photo']['name'];
        $photo_bdd = "/projetF/CRUD/photos/" . $nom_photo;	
        $photo_dossier="C:/xampp/htdocs/projetF/CRUD/photos/".$nom_photo;
        copy($_FILES['photo']['tmp_name'],$photo_dossier);     
    }

$categorie=$_POST["categorie"];
$description=$_POST["description"];
$nom=$_POST["nom"];
$type=$_POST["type"];
$photo=$photo_bdd;
//$photo=" ";
$prix=$_POST["prix"];
$stock=$_POST["stock"];

$req="UPDATE jeux set categorie='$categorie', nom='$nom', description='$description',
 type='$type', photo='$photo',prix='$prix', stock='$stock'
     where id_produit=$_GET[id_produit]";
    $res=$conn->query($req);
    if ($res)
    {echo 'merci';
        header("location:affich_jeux.php?action=affichage");

        //echo '<div style="background: green; padding: 5px;"><center>l\'article a 
        //été mis a jour  dans la base dans votre boutique en ligne</center></div>';
    }
?>