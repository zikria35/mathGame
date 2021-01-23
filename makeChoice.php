<?php
include_once "includes/header.php";
include_once "includes/connection.php";
?>

<div class="jumbotron text-center">
  <h1>Welkom, <?php echo $_SESSION["username"] ?></h1>
  <p>Kies je karakter!</p> 
</div>

<!-- <a href='index.php'>Uitloggen</a> -->

<?php
if (!$_SESSION){
    header('Location: index.php');
}
?>
<div class="container">
<div class="row">
<div class="col-sm-12 text-center">
    <h2>Karakter kiezen</h2>
    <form action="functions/checkChoice.php" method="post">
        <div class="form-check-inline" style="max-width:35%;">
            <label class="form-check-label" for="man" >
                <input type="radio" class="form-check-input" id="man" name="keuzeGender" value="man" ><img src="includes/img/jongen.png" style="max-width:85%;">
            </label>
        </div>
        <div class="form-check-inline" style="max-width:35%;">
            <label class="form-check-label" for="woman" >
                <input type="radio" class="form-check-input" id="woman" name="keuzeGender" value="woman" ><img src="includes/img/meisje.png" style="max-width:85%;">
            </label>
        </div>
        <div class="form-group">
            <button type="submit" value="Bevestigen" name="submit" class="btn btn-success">Bevestigen</button>
        </div>
    </form>
    <a href="index.php" class="btn btn-dark" role="button">Uitloggen</a>

    </div>
    </div>
    </div>
<?php

include_once "includes/footer.php";