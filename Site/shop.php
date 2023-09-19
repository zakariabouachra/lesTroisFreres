<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        button {
            border-radius: 20px;
            border: 1px solid ;
            width:200px;
            height:50px;
            color: black;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }
        button:active {
            transform: scale(0.95);
        }
        button:focus {
             outline: none;
        }
        .quantite{
            width: 70px;
            height: 40px;
            text-align:center;
            font-size:20px;
            

        }
        button:hover{
            cursor: pointer;
            background-color:orangered;
            color : white;
            border: 1px solid orangered;

        }
        .counter span {
            display: block;
            font-size: 35px;
            cursor: pointer;
            color: orangered;
            user-select: none;
            font-weight:bold;
            
        }

        .counter {
            width: 150px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
        .counter input {
            border-radius: 20px;
            font-weight:bold;
            width: 50px;
            border: 1px transparent;
            height: 40px;
            font-size: 20px;
            text-align: center;
            color: black;
            appearance: none;
            outline: 0;
        }
       

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


$req = "SELECT id_produit,nom,photo,prix,stock FROM jeux";
$resultat=$conn->query($req);
$outputs='';
$outputs.= '<div class="box-container">';

while ($ligne = $resultat->fetch_assoc())
{
    foreach ($ligne as $indice => $information)
    {
        if($indice == "photo")
        {
            $outputs .= '<div class="box">
            <div class="image">
                <img  " src="' . $information . '" >
            </div>';
        }
       elseif($indice == "nom")
        {
            $outputs .= '<div class="content">
            <h1 style="font-size:35px; color: orangered; text-shadow: 4px 3px 0px #fff, 9px 8px 0px rgba(0,0,0,0.15);">'. $information .'</h1>';
        }
        elseif($indice == "prix")
        {
            $outputs .= '<div class="price" style="font-size:30px">'. $information .' $</div>';  
        }
        elseif(($indice == "stock"))
        {
            
            if( $information > 0){
                $outputs .= '<div class="price" style="font-size:20px">en stock</div>';
                $outputs .= '
            <div class="icons">
            <form action="?action=ajouter_au_panier&id_produit=' . $ligne['id_produit'] .'&stock=' . $ligne['stock'] .'&nom=' . $ligne['nom'] .'&prix=' . $ligne['prix'] .'&photo='.$ligne['photo'].'" method="post">
                 <div class="counter"> 
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="down" onClick="decreaseCount(event, this)">-</span>
                <input type="text" name="quantite" class="quantite" value="1">
                <span class="up" onClick="increaseCount(event, this)">+</span>
                </div><br><br>
                <button type="submit" class="fas fa-shopping-cart">Ajouter au panier</button>
            </form>
            </div>';
            }
            else{
                $outputs .='<div class="price" style="font-size:20px">Rupture de stock</div>';
            }
            $outputs .= '<div class="stars"  style="font-size:15px; color: orangered" >
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        </div>
        </div>';
            
          
        }
    }

   
 
    
    
}
$outputs .= '</div>';

//<a href="?action=ajouter_au_panier&id_produit=' . $ligne['id_produit'] .'&stock=' . $ligne['stock'] .'&nom=' . $ligne['nom'] .'&prix=' . $ligne['prix'] .'&quantite=' . $_POST['quantite'] .'" class="fas fa-shopping-cart"></a>
   
?>



<div class="heading">
    <h1></h1>
    <p> </p>
</div>

<section class="category">

    <h1 class="title"> our <span>category</span> <a href="shop.html">view all >></a> </h1>

    <div class="box-container">

        <a href="Ps5.php" class="box">
            <img src="image/cat-1.png" alt="" style="margin-right: 15px;">
            <h3>PS5</h3>
        </a>

        <a href="Ps4.php" class="box">
            <img src="image/cat-2.png" alt="">
            <h3>PS4</h3>
        </a>

        <a href="Xbox.php" class="box">
            <img src="image/cat-3.png" alt="">
            <h3>Xbox</h3>
        </a>

        <a href="PC.php" class="box" >
            <img src="image/cat-4.png" alt="" style="margin-left: 25px;">
            <h3>Pc </h3>
        </a>

       

    </div>

</section>

<section class="products">

    <h1 class="title"> our <span>products</span> <a href="#">view all >></a> </h1>

    <?php echo $outputs;?>

    

    

</section>

























<?php require_once('footer.php');?>









<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>