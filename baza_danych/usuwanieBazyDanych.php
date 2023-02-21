<?php
    include "polaczenie.php";
?>

<!DOCTYPE html>
<html lang="pl">
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
                <h2>Pomyślnie usunięto bazę danych</h2>
                <h4>Zaraz nastąpi przekierowanie...</h4>
            </div>
        </article>
    </main>
    <?php
        
        $bazaDanychDoUsunieca = $_POST["listaBazDanychDoUsuniecia"];

        $zapytanie = "DROP DATABASE $bazaDanychDoUsunieca";
        mysqli_query($polaczenie, $zapytanie);

        header("Refresh: 2; http://localhost/baza_danych/zarzadzanieBazaDanych.php");
    ?>
</body>
</html>