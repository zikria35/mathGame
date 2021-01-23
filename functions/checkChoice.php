<?php
include_once "../includes/header.php";
include_once "../includes/connection.php";
if (!$_SESSION){
    header('Location: ../index.php');
}

$choice = $_POST['keuzeGender'];
$gebruikersnaam = $_SESSION["username"];

if(isset($_POST['submit'])){
    if ($query = mysqli_query($conn, "UPDATE users SET keuze='$choice' WHERE gebruikersnaam = '$gebruikersnaam'")){
        header('Location: ../game.php');
    }else{
        echo "Iets gaat fout... <a href='../index.php' class='btn btn-warning' role='button'>Opnieuw</a> ";
    }
}

?>

<?php
include_once "../includes/footer.php";