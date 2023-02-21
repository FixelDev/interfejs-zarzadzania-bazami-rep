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

    <script src="scripts/script.js"></script>

    <link rel="stylesheet" href="style/style.css">  
    <link rel="stylesheet" href="fontello/css/fontello.css">
</head>
<body>
    <h1>
    <?php
            $nazwaBazyDanych = $_SESSION['nazwaWybranejBazyDanych'];
            $nazwaTabeli = $_SESSION['nazwaTabeli'];

            echo "$nazwaBazyDanych / $nazwaTabeli";
        ?>
    </h1>
    <main>

        <div class="wysrodkowanieZawartosci">
            <?php
                
                $nazwaTabeli = $_SESSION['nazwaTabeli'];

                $zapytanieZawartoscTabeli = "SELECT * FROM " . $nazwaTabeli;
                $rezultatZawartoscTabeli = mysqli_query($_SESSION['polaczenieBazaDanych'], $zapytanieZawartoscTabeli);
                
                $liczbaKolumn = mysqli_num_fields($rezultatZawartoscTabeli);
                $liczbaWierszy = mysqli_num_rows($rezultatZawartoscTabeli);

                $zapytanieNazwaKolumn = 'SHOW COLUMNS FROM ' .   $nazwaTabeli;
                $rezultatNazwaKolumn = mysqli_query($_SESSION['polaczenieBazaDanych'], $zapytanieNazwaKolumn);

                $tabela = "<table>";

                $tabela .= "<tr>";
                while($wiersz = mysqli_fetch_array($rezultatNazwaKolumn))
                {       
                    $nazwaKolumny = $wiersz["Field"];  
                    $tabela .= "<th> $nazwaKolumny </th>";           
                }
                
                $tabela .= "</tr>";

                for($i = 0; $i < $liczbaWierszy; $i++)
                {
                    $tabela .= "<tr>";
                    
                    $wiersz = mysqli_fetch_row($rezultatZawartoscTabeli);
                    for($j = 0; $j < $liczbaKolumn; $j++)
                    {
                        $tabela .= "<td> $wiersz[$j] </td>";
                    }
                    
                    $tabela .= "</tr>";
                }

                $tabela .= "</table>";

                echo $tabela;
            ?>
        </div>
    </main>


    <footer>
        <button class="przycisk" id="przyciskPowrot" onClick="zaladujStrone('http://localhost/baza_danych/kreatorTabel.php');"><i class="icon-left-big"></i></button>
    </footer>
</body>
</html>