<?php
        include "polaczenie.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="fontello/css/fontello.css">
    
    <script src="scripts/script.js"></script>
</head>
<body>
    
    <main>
        <article>
            <h3>Tworzenie nowej bazy danych</h3>
            <div class="wysrodkowanieZawartosci">
                <form action="nowaBazaDanych.php" method="POST">  
                    <input type="text" name="nazwaNowejBazyDanych" placeholder="Nazwa bazy danych"><br>
                    <button type="submit" class="przycisk"><i class="icon-plus"></i>Dodaj</button>
                </form>
            </div>
           
        </article>

        <article>
            <h3>Usuwanie bazy danych</h3>
            <div class="wysrodkowanieZawartosci">
                <form action="usuwanieBazyDanych.php" method="POST">
                    <select name="listaBazDanychDoUsuniecia">
                        <?php
                            wygenerujListeBazDanych();
                        ?>
                    </select>  <br>
                    <button type="submit" class="przycisk"><i class="icon-trash"></i>Usuń</button>
                </form>
            </div>     
    </article>

    <article>
        <h3>Modyfikowanie bazy danych</h3>
        <div class="wysrodkowanieZawartosci">
            <form action="kreatorBazyDanych.php" method="POST">
                <select name="listaBazDanychDoKreatora">
                    <?php
                        wygenerujListeBazDanych();
                    ?>
                </select>  <br>
                <button type="submit" class="przycisk"><i class="icon-wrench"></i>Modyfikuj</button>
            </form>
        </div>
        
    </article>
    </main>


    <?php

        function wygenerujListeBazDanych()
        {
            $zapytanie = "SHOW DATABASES";
            $rezultat = mysqli_query($_SESSION['polaczenie'], $zapytanie);
            
            while($wiersz = $rezultat->fetch_array(MYSQLI_NUM))
            {
                $nazwaBazyDanych = $wiersz[0];
                $kod=<<<EOD
                <option value="$nazwaBazyDanych">$nazwaBazyDanych</option> 
                EOD;
                echo $kod;
            }
        }
    ?>

    <footer>
        <button class="przycisk" id="przyciskPowrot" onClick="zaladujStrone('http://localhost/baza_danych/index.php');"><i class="icon-left-big"></i></button>
    </footer>
</body>
</html>