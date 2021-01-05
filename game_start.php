<?php
include_once "includes/header.php";
include_once "includes/connection.php";
if (!$_SESSION){
    header('Location: index.php');
}
echo "Succes " . $_SESSION["username"] . "!</br >";

if (!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}elseif ($_SESSION['score'] > 0){
    echo "Score: " . $_SESSION['score'] . "</br >";
}



$som = array();
$_SESSION['difficulty'] = 1;

if (isset($_POST['numbers']) || isset($_SESSION['numbers'])){
    if (isset($_POST['numbers'])){
        $_SESSION['numbers'] = $_POST['numbers'];
    }
    $maxNumber = $_SESSION['numbers'];
    if($maxNumber > 4){
        $_SESSION['difficulty'] = $_SESSION['difficulty'] + 1;
    }
    if($maxNumber > 8){
        $_SESSION['difficulty'] = $_SESSION['difficulty'] + 1;
    }
    if($maxNumber >= 10){
        $_SESSION['difficulty'] = $_SESSION['difficulty'] + 1;
    }
}


if (isset($_POST['delen']) || isset($_SESSION['delen'])){
    if (isset($_POST['delen'])){
        $_SESSION['delen'] = $_POST['delen'];
    }
    array_push($som, $_SESSION['delen']);
    $_SESSION['difficulty'] = $_SESSION['difficulty'] + 1;
}

if (isset($_POST['optellen']) || isset($_SESSION['optellen'])){
    if (isset($_POST['optellen'])){
        $_SESSION['optellen'] = $_POST['optellen'];
    }
    array_push($som, $_SESSION['optellen']);
    $_SESSION['difficulty'] = $_SESSION['difficulty'] + 1;
}

if (isset($_POST['aftrekken']) || isset($_SESSION['aftrekken'])){
    if (isset($_POST['aftrekken'])){
        $_SESSION['aftrekken'] = $_POST['aftrekken'];
    }
    array_push($som, $_SESSION['aftrekken']);
    $_SESSION['difficulty'] = $_SESSION['difficulty'] + 1;
}

if (isset($_POST['vermenigvuldigen']) || isset($_SESSION['vermenigvuldigen'])){
    if (isset($_POST['vermenigvuldigen'])){
        $_SESSION['vermenigvuldigen'] = $_POST['vermenigvuldigen'];
    }
    array_push($som, $_SESSION['vermenigvuldigen']);
    $_SESSION['difficulty'] = $_SESSION['difficulty'] + 1;
}

if(!isset($_SESSION['delen']) && !isset($_SESSION['optellen']) && !isset($_SESSION['aftrekken']) && !isset($_SESSION['vermenigvuldigen'])){
    header('Location: game.php');
}

$randomNumber1 = rand(1,$maxNumber);
$randomNumber2= rand(1,$maxNumber);
$actionSum = $som[rand(0, count($som) - 1)];

?>
    <form action="functions/checkAnswer.php" method="post">
<?php
if($actionSum == "-"){
    $answer = $randomNumber1 - $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo $randomNumber1 . " - " . $randomNumber2 . " = <input type='text' name='guessedAnswer'>";
}elseif ($actionSum == "+"){
    $answer = $randomNumber1 + $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo $randomNumber1 . " + " . $randomNumber2 . " = <input type='text' name='guessedAnswer'>";
}elseif ($actionSum == "/"){
    $answer = $randomNumber1 / $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo $randomNumber1 . " / " . $randomNumber2 . " = <input type='text' name='guessedAnswer'>";
}else{
    $answer = $randomNumber1 * $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo $randomNumber1 . " * " . $randomNumber2 . " = <input type='text' name='guessedAnswer'>";
}
?>
    <br />
    <input type="submit" name="submit" value="Check">
    <a href="index.php">Stoppen</a>

</form>
<?php


include_once "includes/footer.php";