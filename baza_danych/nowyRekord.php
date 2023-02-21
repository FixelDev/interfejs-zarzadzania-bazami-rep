<?php
    include "polaczenieBazaDanych.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/style.css">
    <script src="scripts/script.js"></script>
</head>
<body>

    <main>
        <article>
            <div class="wysrodkowanieZawartosciKolumna">
                <h2>Pomyślnie utworzono rekord</h2>
                <h4>Zaraz nastąpi przekierowanie...</h4>
            </div>
        </article>
    </main>
    <?php
        
        $nazwaTabeli = $_SESSION['nazwaTabeli'];

        $zapytanie = "INSERT INTO $nazwaTabeli VALUES (' ', ";

        $index = 1;
        while(isset($_POST["kolumna" . $index]))
        {
            $nazwaKolumny = "kolumna" . $index;
            $zapytanie .= "'$_POST[$nazwaKolumny]', ";
            $index++;
        }
        
        $zapytanie = rtrim($zapytanie, ", ");
        $zapytanie .= ")";
        mysqli_query($polaczenieBazaDanych, $zapytanie);
        header("Refresh: 2; http://localhost/baza_danych/kreatorTabel.php");
    ?>
</body>
</html>