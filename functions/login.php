<?php
include_once "../includes/header.php";
require ("../includes/connection.php");



$gebruikersnaam = $_POST['username'];
$wachtwoord = $_POST['password'];


if ($result = mysqli_query($conn, "SELECT wachtwoord FROM users WHERE gebruikersnaam = '$gebruikersnaam'")) {
    $row = mysqli_fetch_assoc($result);
    if ($row['wachtwoord'] == $wachtwoord){
        $_SESSION["username"] = $gebruikersnaam;
        header('Location: ../game.php');
    }
    else{
        echo "Gebruikersnaam en/of wachtwoord onjuist! </br> <a href='../index.php'>Opnieuw</a>";
    }
}
