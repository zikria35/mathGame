<?php
include_once "../includes/header.php";
require ("../includes/connection.php");



$gebruikersnaam = $_POST['username'];
$wachtwoord = $_POST['password'];


if ($result = mysqli_query($conn, "SELECT wachtwoord FROM users WHERE gebruikersnaam = '$gebruikersnaam'")) {
    $row = mysqli_fetch_assoc($result);
    if ($row['wachtwoord'] == $wachtwoord){
        $_SESSION["username"] = $gebruikersnaam;
        if($resultChoice = mysqli_query($conn, "SELECT keuze FROM users WHERE gebruikersnaam = '$gebruikersnaam'")){
            $rowChoice = mysqli_fetch_assoc($resultChoice);
            if($rowChoice['keuze'] != ""){
                header('Location: ../game.php');
            }else{
                header('Location: ../makeChoice.php');
            }
        }
    }
    else{
        echo "Gebruikersnaam en/of wachtwoord onjuist! </br> <a href='../index.php' class='btn btn-warning' role='button'>Opnieuw</a> ";
    }
}
