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
    <link rel="stylesheet" href="fontello/css/fontello.css">
    
    <script src="scripts/script.js"></script>
</head>
<body>
    <h1>
        <?php
            $nazwaBazyDanych = $_SESSION['nazwaWybranejBazyDanych'];
            $nazwaTabeli = $_SESSION['nazwaTabeli'];

            echo "$nazwaBazyDanych / $nazwaTabeli";
        ?>
    </h1>
    <main id="kreatorBazDanychMain">
        <article id="lewyArtykul">
            <h3>Dodaj rekord</h3>
            <div class="wysrodkowanieZawartosci">
                <form action="nowyRekord.php" id="kreatorTabeli" method="POST">
                <div id="listaKolumn">
                    <?php
                        generujListeKolumn();
                    ?>
                </div>
                <button type="submit" class="przycisk"><i class="icon-plus"></i>Dodaj</button>
                </form>
            </div>             
        </article>
    

    <article id="lewyArtykul">
        <h3>Usuń rekord</h3>
        <div class="wysrodkowanieZawartosci">
            <form action="usuwanieRekordu.php" method="POST">
 
                <select name="nazwaRekorduDoUsuniecia" id="listaRekordow">
                    <?php
                        generujListeRekordow();
                    ?>
                </select>
                <br>
                <button type="submit" class="przycisk"><i class="icon-trash"></i>Usuń</button>
            </form>
        </div>
    </article>

    <article id="prawyArtykul">
        <h3>Wypisz rekordy</h3>
        <div class="wysrodkowanieZawartosci">
            <form action="wyswietlanieRekordu.php" method="POST">
                <button type="submit" class="przycisk" id="wygenerujTabelePrzycisk"><i class="icon-table" ></i>Wygeneruj tabelę</button>
            </form>
        </div>
    </article>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
    </script>

    </main>

    <?php
        function generujListeKolumn()
        {
            
            if(isset($_POST["nazwaTabeliDoKreatora"]))
            {
                $_SESSION['nazwaTabeli'] = $_POST["nazwaTabeliDoKreatora"];
            }

            $zapytanie = 'SHOW COLUMNS FROM ' .  $_SESSION['nazwaTabeli'];
            $rezultat = mysqli_query($_SESSION['polaczenieBazaDanych'], $zapytanie);
            $index = 0;
            while($row = mysqli_fetch_array($rezultat))
            {
                
                $nazwaKolumny = $row["Field"];

                if($nazwaKolumny == "id")
                    continue;
                $index++;
                echo '<input type="text" placeholder=' . $nazwaKolumny . ' name="kolumna' . $index . '"> <br>';
            }
        }

        function generujListeRekordow()
        {
            $zapytanie = "SELECT * FROM " . $_SESSION['nazwaTabeli'];
            $rezultat = mysqli_query($_SESSION['polaczenieBazaDanych'], $zapytanie);
            
            $liczbaKolumn = mysqli_num_fields($rezultat);
            $liczbaWierszy = mysqli_num_rows($rezultat);
            for($i = 0; $i < $liczbaWierszy; $i++)
            {
                
                $wiersz = mysqli_fetch_row($rezultat);
                $opcja='<option value="' .  $wiersz[0]. '">';
                for($j = 0; $j < $liczbaKolumn; $j++)
                {
                    $opcja .= " | $wiersz[$j]";
                }
                $opcja .= "</option>";
                echo $opcja;
            }
        }
    ?>

    <footer>
        <button class="przycisk" id="przyciskPowrot"onClick="zaladujStrone('http://localhost/baza_danych/kreatorBazyDanych.php');"><i class="icon-left-big"></i></button>
    </footer>
</body>
</html>