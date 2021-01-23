<?php
include_once "../includes/header.php";
require ("../includes/connection.php");

$gebruikersnaam = $_POST['username'];
$wachtwoord = $_POST['password'];


if(isset($_POST['submit'])){
    if ($query = mysqli_query($conn, "INSERT INTO users (gebruikersnaam, wachtwoord) VALUES('$gebruikersnaam', '$wachtwoord')")){

        $_SESSION["username"] = $gebruikersnaam;
        header('Location: ../makeChoice.php');
    }else{
        echo "Gebruikersnaam al in gebruik! </br> <a href='../index.php' class='btn btn-warning' role='button'>Opnieuw</a> ";
        
    }
}