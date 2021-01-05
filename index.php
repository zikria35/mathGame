<?php
include_once "includes/header.php";
include_once "includes/connection.php";
session_destroy();
?>
Registreer nu!
<form action="functions/register.php" method="POST">

    Kies gebruikersnaam: <input type="text" required name="username"></br>
    Kies wachtwoord: <input type="password" required name="password">
    <br />
    <input type="submit" name="submit" value="Registreer">

</form>

Heb je al een account?
<form action="functions/login.php" method="POST">

    Gebruikersnaam: <input type="text" required name="username"></br>
    Wachtwoord: <input type="password" required name="password">
    <br />
    <input type="submit" name="submit" value="Login">

</form>

<?php
include_once "includes/highscores.php";
include_once "includes/footer.php";
