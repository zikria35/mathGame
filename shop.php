<?php
include_once "includes/header.php";
include_once "includes/connection.php";

$username = $_SESSION['username'];
if ($resultaat = mysqli_query($conn, "SELECT saldo FROM users WHERE gebruikersnaam = '$username'")) {
    $saldo = $resultaat->fetch_assoc()['saldo'];
}
if ($huidigeKeuzeResult = mysqli_query($conn, "SELECT keuze FROM users WHERE gebruikersnaam = '$username'")){
    $huidigeKeuze = $huidigeKeuzeResult->fetch_assoc()['keuze'];
}
if ($huidigeCharResult = mysqli_query($conn, "SELECT currentChar FROM users WHERE gebruikersnaam = '$username'")){
    $huidigeChar = $huidigeCharResult->fetch_assoc()['currentChar'];
}
if ($huidigeKeuze == "man"){
    if($huidigeChar == "jongen_ballon"){
        $linkImgKeuze = "includes/img/jongen_ballon.png";
    }elseif($huidigeChar == "jongen_muts"){
        $linkImgKeuze = "includes/img/jongen_muts.png";
    }elseif($huidigeChar == "jongen_tas"){
        $linkImgKeuze = "includes/img/jongen_tas.png";
    }else{
        $linkImgKeuze = "includes/img/jongen.png";
    }
    $imageUrls = array("includes/img/jongen.png", "includes/img/jongen_ballon.png", "includes/img/jongen_muts.png", "includes/img/jongen_tas.png");
}else{
    if($huidigeChar == "meisje_strik"){
        $linkImgKeuze = "includes/img/meisje_strik.png";
    }elseif($huidigeChar == "meisje_muts"){
        $linkImgKeuze = "includes/img/meisje_muts.png";
    }elseif($huidigeChar == "meisje_tas"){
        $linkImgKeuze = "includes/img/meisje_tas.png";
    }else{
        $linkImgKeuze = "includes/img/meisje.png";
    }
    $imageUrls = array("includes/img/meisje.png", "includes/img/meisje_strik.png", "includes/img/meisje_muts.png", "includes/img/meisje_tas.png");
}
?>
<div class="jumbotron text-center">
  <h1>Shop</h1>
  <p>Saldo: <?php echo $saldo; ?></p> 
</div>

<?php
if (!$_SESSION){
    header('Location: index.php');
}?>


<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Outfit veranderen</h2>
                </div>
                <?php 
                    $price = 150;
                    $count = 0;
                    foreach($imageUrls as $imageUrl){
                        if($imageUrl != $linkImgKeuze){
                            echo "
                            <div class='col-sm-4' style='text-align:center;'>
                                <img src='".$imageUrl."' style='max-width:100%;'>
                                <p>Prijs: ".$price."</p>
                                <a href='functions/checkBuy.php?buy=".$imageUrl."&cost=".$price."' class='btn btn-success' role='button'>Kopen</a>
                            </div>
                            ";
                            $price = $price + 150;
                            $count = $count +1;
                        }
                    }
                
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <h2 style="text-align:center;">Huidige karakter</h2>
            <p><?php echo "<img src='".$linkImgKeuze."' style='max-width:100%;'>" ?></p>
        </div>
        <div class="col-sm-12">
            <a href="game.php" class="btn btn-info" role="button">Terug</a>
            <a href="index.php" class="btn btn-dark" role="button">Uitloggen</a>
        </div>
    </div>
</div>


<?php

include_once "includes/footer.php";