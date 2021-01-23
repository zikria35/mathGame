<?php
include_once "../includes/header.php";
include_once "../includes/connection.php";
if (!$_SESSION){
    header('Location: ../index.php');
}
?>






        

<?php
$guessedAnswer = $_POST['guessedAnswer'];
$actualAnswer = $_SESSION['answer'];

if ($guessedAnswer == $actualAnswer){
    $_SESSION['score'] = $_SESSION['score'] + $_SESSION['difficulty'];
    header('Location: ../game_start.php');
}else{
    $score = $_SESSION['score'];
    $gebruikersnaam = $_SESSION["username"];
    if ($result = mysqli_query($conn, "SELECT score FROM users WHERE gebruikersnaam = '$gebruikersnaam'")) {
        if (mysqli_fetch_assoc($result) > $score){
            if ($query = mysqli_query($conn, "UPDATE users SET score = $score WHERE gebruikersnaam = '$gebruikersnaam'")){
                
            }else{
                echo "fail" . mysqli_error($conn);
                echo "<br />" . $query;
            }
        }

        if ($resultaat = mysqli_query($conn, "SELECT saldo FROM users WHERE gebruikersnaam = '$gebruikersnaam'")) {
            $currentSaldo = $resultaat->fetch_assoc()['saldo'];
        }
        $newSaldo = $currentSaldo + $score;
        if($updateSaldo = mysqli_query($conn, "UPDATE users SET saldo = '$newSaldo' WHERE gebruikersnaam = '$gebruikersnaam'")){
            
        }
        echo "
        <div class='jumbotron text-center'>
            <h1>Verloren!</h1>
            <p>Eindscore: ". $score ." </p> 
            <p>Saldo: ". $newSaldo ." </p>
        </div>
        ";


        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php include_once "../includes/highscores.php"; ?>
                </div>
                <div class="col-sm-6">
                    <a href="../game.php" class="btn btn-primary" role="button">Opnieuw</a>
                    <a href="../index.php" class="btn btn-dark" role="button">Stoppen</a>
                </div>
            </div>    
        </div>
        <?php
    }
    
    
}
?>

<?php
include_once "../includes/footer.php";