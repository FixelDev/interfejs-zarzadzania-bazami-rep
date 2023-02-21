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

            echo $nazwaBazyDanych;
        ?>
    </h1>
    <main id="kreatorBazDanychMain">
        <article id="lewyArtykul">
            <h3>Utwórz tabelę</h3>
            <div class="wysrodkowanieZawartosci">
                <form action="nowaTabela.php" id="kreatorTabeli" method="POST">
                <div id="listaKolumn">
                    <input type="text" name="nazwaTabeli" id="nazwaTabeli" placeholder="Nazwa tabeli"><br>
                    <input type="text" id="kluczGlowny" name="0" placeholder="klucz główny (auto increment)" readonly><br>
                    <input type="button" value="-" onClick="usunKolumne();" class="przyciskTabel przycisk ">
                    <input type="button" value="+" onClick="dodajKolumne();"class="przyciskTabel przycisk "><br>
                    
                </div>
                <button type="submit" class="przycisk"><i class="icon-plus"></i>Dodaj</button>
                </form>
            </div>             
        </article>
    

    <article id="lewyArtykul">
        <h3>Usuń tabelę</h3>
        <div class="wysrodkowanieZawartosci">
            <form action="usuwanieTabeli.php" method="POST">
                <select name="nazwaTabeliDoUsuniecia">
                    <?php
                        include "generatorTabel.php";
                    ?>
                </select>
                <br>
                <button type="submit" class="przycisk"><i class="icon-trash"></i>Usuń</button>
            </form>
        </div>
    </article>

    <article id="prawyArtykul">
        <h3>Modyfikuj tabelę</h3>
        <div class="wysrodkowanieZawartosci">
            <form action="kreatorTabel.php" method="POST">
                <select name="nazwaTabeliDoKreatora">
                    <?php
                        include "generatorTabel.php";
                    ?>
                </select>
                <br>
                <button type="submit" class="przycisk"><i class="icon-wrench"></i>Modyfikuj</button>
            </form>
        </div>

        <script>
            przeladowanie();
        </script>
    </article>

    <script>
        inicjalizujKolumny();
    </script>


    </main>
    <footer>
        <button class="przycisk" id="przyciskPowrot" onClick="zaladujStrone('http://localhost/baza_danych/zarzadzanieBazaDanych.php');"><i class="icon-left-big"></i></button>
    </footer>
    
</body>
</html>