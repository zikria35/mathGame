<?php
include_once "../includes/header.php";
include_once "../includes/connection.php";
if (!$_SESSION){
    header('Location: ../index.php');
}
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
        echo "Verloren! </br> Eindscore: ". $score;

        include_once "../includes/highscores.php";

       
        
    }
    
    
}
?>
<a href="../game.php">Opnieuw</a></br>
<a href="../index.php">Stoppen</a>
<?php
include_once "../includes/footer.php";