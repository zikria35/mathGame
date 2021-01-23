<?php
include_once "../includes/header.php";
include_once "../includes/connection.php";
if (!$_SESSION){
    header('Location: ../index.php');
}
$gebruikersnaam = $_SESSION["username"];
$buy = $_GET['buy'];
$buy = substr($buy, 13, -4);
$cost = $_GET['cost'];

if ($resultaat = mysqli_query($conn, "SELECT saldo FROM users WHERE gebruikersnaam = '$gebruikersnaam'")) {
    $saldo = $resultaat->fetch_assoc()['saldo'];
}


if($saldo >= $cost){
    $saldo = $saldo - $cost;
    if ($query = mysqli_query($conn, "UPDATE users SET saldo='$saldo' WHERE gebruikersnaam = '$gebruikersnaam'")){
        if($query = mysqli_query($conn, "UPDATE users SET currentChar='$buy' WHERE gebruikersnaam = '$gebruikersnaam'")){
            header('Location: ../shop.php');
        }
    }
}else{
    echo "Saldo te laag! <a href='../shop.php' class='btn btn-info' role='button'>Terug</a>";
    
}



?>

<?php
include_once "../includes/footer.php";