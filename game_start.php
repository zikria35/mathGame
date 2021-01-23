<?php
include_once "includes/header.php";
include_once "includes/connection.php";
if (!$_SESSION){
    header('Location: index.php');
}

?>



<div class="jumbotron text-center">
  <h1>Succes <?php echo $_SESSION["username"] ?>!</h1>
  <?php
  if(isset($_SESSION['score'])){
    
        echo "<p>Score: " . $_SESSION['score'] . "</p>";
        
  }

  ?>
</div>

<div class="container">
<div class="row">
<div class="col-sm-12 text-center">
<?php
if (!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
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
    <form action="functions/checkAnswer.php" method="post" class="justify-content-center">
<?php

if($actionSum == "-"){
    $answer = $randomNumber1 - $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo "<h2 style='text-align:center;'>" . $randomNumber1 . " - " . $randomNumber2 . "</h2>" . "<div class='form-group'><input style='text-align:center;' type='text' name='guessedAnswer' class='form-control'></div>";
}elseif ($actionSum == "+"){
    $answer = $randomNumber1 + $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo "<h2 style='text-align:center;'>" . $randomNumber1 . " + " . $randomNumber2 . "</h2>" . "<div class='form-group'><input style='text-align:center;' type='text' name='guessedAnswer' class='form-control'></div>";
}elseif ($actionSum == "/"){
    $answer = $randomNumber1 / $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo "<h2 style='text-align:center;'>" . $randomNumber1 . " / " . $randomNumber2 . "</h2>" . "<div class='form-group'><input style='text-align:center;' type='text' name='guessedAnswer' class='form-control'></div>";
}else{
    $answer = $randomNumber1 * $randomNumber2;
    $_SESSION['answer'] = $answer;
    echo "<h2 style='text-align:center;'>" . $randomNumber1 . " * " . $randomNumber2 . "</h2>" . "<div class='form-group'><input style='text-align:center;' type='text' name='guessedAnswer' class='form-control'></div>";
}
?>

<button type="submit" value="Controleer" name="submit" class="btn btn-warning">Controleer</button>


</form>
<a href="index.php" class="btn btn-danger" role="button">Stoppen</a> 
</div>
</div>
</div>
<?php


include_once "includes/footer.php";