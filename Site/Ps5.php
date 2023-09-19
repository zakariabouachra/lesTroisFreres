<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogs</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">

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
<?php require_once('header.php');

$req = "SELECT id_produit,nom,photo,prix,stock FROM jeux WHERE type='PS5'";
    $resultat=$conn->query($req);
     
    $outputs.= '<div class="box-container">';

    while ($ligne = $resultat->fetch_assoc())
    {
        $outputs .= '<tr>';
        foreach ($ligne as $indice => $information)
        {
            if($indice == "photo")
            {
                $outputs .= '<div class="box">
                <div class="image">
                    <img " src="' . $information . '" >
                </div></div>';
            }
            elseif($indice == "nom")
            {
                $outputs .= '<div class="content">
                <h1 style="font-size:35px; color: orangered; text-shadow: 4px 3px 0px #fff, 9px 8px 0px rgba(0,0,0,0.15);">'. $information .'</h1>';
            }
            elseif($indice == "prix")
            {
                $outputs .= '<br><h2 style="font-size:25px;">Prix = '. $information .'$</h2>';  
            }
            elseif($indice == "stock")
            {
                if($information > 0){
                    $outputs .= '<div class="price" style="font-size:20px">en stock</div>
                    <form action="?action=ajouter_au_panier&id_produit=' . $ligne['id_produit'] .'&stock=' . $ligne['stock'] .'&nom=' . $ligne['nom'] .'&prix=' . $ligne['prix'] .'&photo='.$ligne['photo'].'" method="post">
                <div class="counter">    
                <label for="" style="font-size:15px;" > Quantite&nbsp;:&nbsp;&nbsp; </label> 
               <span class="down" onClick="decreaseCount(event, this)">-</span>
               <input type="text" name="quantite" class="quantite" value="1">
               <span class="up" onClick="increaseCount(event, this)">+</span>
               </div><br>
               <button type="submit" class="fas fa-shopping-cart">Ajouter au panier</button>
           </form>';
                }
                else{
                    $outputs .='<div class="price" style="font-size:20px">Rupture de stock</div>';
                }
                $outputs .= ' </div>';   
            }
        }
       
        

        
    }
    
    $outputs .= '</div>';
    
    



?>

<div class="heading_ps5">
   
</div>

<section class="blogs">


    <h1 class="title"> our <span>blogs</span> <a href="shop.php">view all >></a> </h1>
    <?php echo $outputs; ?>
   <!-- <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="image/product-2.jpg" alt="">
            </div>
            <div class="content">
                
                <h3>God of War Ragnarök Launch Edition - PlayStation 5</h3>
                <a href="#" class="btn">Ajouter au panier</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/product-6.jpg" alt="">
            </div>
            <div class="content">
                
                <h3>FIFA 23 - PlayStation 5 </h3>
                <a href="#" class="btn">Ajouter au panier</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/product-7.jpg" alt="">
            </div>
            <div class="content">
                
                <h3>Call Of Duty Vanguard Playstation 5</h3>
                <a href="#" class="btn">Ajouter au panier</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/product-8.jpg" alt="">
            </div>
            <div class="content">
                
                <h3>Far Cry 6 PlayStation 5</h3>
                <a href="#" class="btn">Ajouter au panier</a>
            </div>
        </div>

    </div>
    -->
</section>

















<?php require_once('footer.php');?>
















<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>