<h2>Highscores</h2>
<?php

if ($resultHighscore = mysqli_query($conn, "SELECT score, gebruikersnaam FROM users ORDER BY score DESC")) {
    echo"<table class='table'><thead class='thead-dark'>";
    echo"<tr>
            <th scope='col'>#</th>
            <th scope='col'>Gebruikersnaam</th>
            <th scope='col'>Score</th>      
        </tr>
        </thead><tbody>";
    $counter = 1;
    $max = 20;
    while (($rowHighscore = mysqli_fetch_array($resultHighscore)) and ($counter <= $max)) {
        echo "<tr>
            <th scope='row'>".$counter."</th>
            <td>".($rowHighscore['gebruikersnaam'])."</td>
            <td>".($rowHighscore['score'])."</td>
        </tr>";
        $counter++;
    }
    echo"</tbody></table>";
}else{
    echo "Nog niemand heeft een score behaald!";
}
