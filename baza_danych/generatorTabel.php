<?php
    $zapytanie = "SHOW TABLES";
    $rezultat = mysqli_query($_SESSION['polaczenieBazaDanych'], $zapytanie);
    
    while($wiersz = $rezultat->fetch_array(MYSQLI_NUM))
    {
        $nazwaTabeli = $wiersz[0];
        $kod=<<<EOD
        <option value="$nazwaTabeli">$nazwaTabeli</option> 
        EOD;
        echo $kod;
    }
?>