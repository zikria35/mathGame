<?php
include_once "includes/header.php";
include_once "includes/connection.php";
unset($_SESSION['score']);
unset($_SESSION['numbers']);
unset($_SESSION['delen']);     
unset($_SESSION['aftrekken']);
unset($_SESSION['vermenigvuldigen']);
unset($_SESSION['optellen']);
unset($_SESSION['answer']);
unset($_SESSION['difficulty']);
echo "Welkom, " . $_SESSION["username"] . ", <a href='index.php'>Uitloggen</a> ";
if (!$_SESSION){
    header('Location: index.php');
}
?>

<form action="game_start.php" method="post">
    Kies maximumgetal:
    <select id="numbers" name="numbers">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    </br>
    <input type="checkbox" id="vermenigvuldigen" name="vermenigvuldigen" value="*">X</br>
    <input type="checkbox" id="delen" name="delen" value="/">/</br>
    <input type="checkbox" id="aftrekken" name="aftrekken" value="-">-</br>
    <input type="checkbox" id="optellen" name="optellen" value="+">+</br>

    <input type="submit" value="Begin">

</form>


<?php

include_once "includes/footer.php";