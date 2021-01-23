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
$username = $_SESSION['username'];
if ($resultaat = mysqli_query($conn, "SELECT saldo FROM users WHERE gebruikersnaam = '$username'")) {
    $saldo = $resultaat->fetch_assoc()['saldo'];
}
?>

<div class="jumbotron text-center">
  <h1>Welkom, <?php echo $_SESSION["username"] ?></h1>
  <p>Saldo: <?php echo $saldo; ?></p> 
</div>

<!-- <a href='index.php'>Uitloggen</a> -->


<?php
if (!$_SESSION){
    header('Location: index.php');
}


?>
<div class="container">
    <h2>Moeilijkheidsgraad kiezen</h2>
    <form action="game_start.php" method="post">
        <div class="form-group">
            <label for="numbers">Kies maximumgetal:</label>
            <select class="form-control" id="numbers" name="numbers">
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
        </div>
        <div class="form-group">
            <div class="form-check-inline">
            <label class="form-check-label" for="vermenigvuldigen">
                <input type="checkbox" class="form-check-input" id="vermenigvuldigen" name="vermenigvuldigen" value="*">Vermenigvuldigen (X)
            </label>
            </div>
            <div class="form-check-inline">
            <label class="form-check-label" for="delen">
                <input type="checkbox" class="form-check-input" id="delen" name="delen" value="/">Delen (/)
            </label>
            </div>
            <div class="form-check-inline">
            <label class="form-check-label" for="aftrekken">
                <input type="checkbox" class="form-check-input" id="aftrekken" name="aftrekken" value="-">Aftrekken (-)
            </label>
            </div>
            <div class="form-check-inline">
            <label class="form-check-label" for="optellen">
                <input type="checkbox" class="form-check-input" id="optellen" name="optellen" value="+">Optellen (+)
            </label>
            </div>
        </div>
        <button type="submit" value="Begin" name="submit" class="btn btn-success">Begin</button>
    </form>
    <a href="shop.php" class="btn btn-info" role="button">Shop</a>
    <a href="index.php" class="btn btn-dark" role="button">Uitloggen</a>

</div>
<?php

include_once "includes/footer.php";