<h1>Highscores</h1>
<?php

if ($resultHighscore = mysqli_query($conn, "SELECT score, gebruikersnaam FROM users ORDER BY score DESC")) {
    echo"<table>";
    echo"<th>Rang</th><th>Gebruikersnaam</th><th>Score</th>";
    $counter = 1;
    $max = 20;
    while (($rowHighscore = mysqli_fetch_array($resultHighscore)) and ($counter <= $max)) {
        echo "<tr>
            <td>".$counter."</td>
            <td>".($rowHighscore['gebruikersnaam'])."</td>
            <td>".($rowHighscore['score'])."</td>
        </tr>";
        $counter++;
    }
    echo"</table>";
}else{
    echo "Nog niemand heeft een score behaald!";
}
