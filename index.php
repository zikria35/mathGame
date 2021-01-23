<?php
include_once "includes/header.php";
include_once "includes/connection.php";
session_destroy();
?>


<div class="jumbotron text-center">
  <h1>Math Game</h1>
  <p>#1 spel van Nederland!</p> 
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>Inloggen</h2>
            <form action="functions/login.php" method="POST">
                <div class="form-group">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" class="form-control" required id="username" placeholder="Voer gebruikersnaam in" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" class="form-control" id="password" required placeholder="Voer wachtwoord in" name="password">
                </div>
                <button type="submit" value="Login" name="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="col-sm-4">
            <h2>Registreren</h2>
            <form action="functions/register.php" method="POST">
                <div class="form-group">
                    <label for="username">Kies gebruikersnaam:</label>
                    <input type="text" class="form-control" required id="username" placeholder="Voer gebruikersnaam in" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Kies wachtwoord:</label>
                    <input type="password" class="form-control" id="password" required placeholder="Voer wachtwoord in" name="password">
                </div>
                <button type="submit" value="Registreer" name="submit" class="btn btn-primary">Registreer</button>
            </form>
        </div>
        <div class="col-sm-4">
            <?php include_once "includes/highscores.php"; ?>
        </div>
    </div>
</div>


<?php
include_once "includes/footer.php";
