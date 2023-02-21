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
                <h2>Pomyślnie utworzono tabelę</h2>
                <h4>Zaraz nastąpi przekierowanie...</h4>
            </div>
        </article>
    </main>
    <?php
        
        $nazwaTabeli = $_POST['nazwaTabeli'];
        $sql = "CREATE TABLE $nazwaTabeli (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,";
        $index = 1;
        while(isset($_POST[$index]))
        {
            $sql .= "$_POST[$index] VARCHAR(30) NOT NULL, ";
            $index++;
        }
        $sql = rtrim($sql, ", ");
        $sql .= ")";
        
        mysqli_query($polaczenieBazaDanych, $sql);
        header("Refresh: 2; http://localhost/baza_danych/kreatorBazyDanych.php");
    ?>
</body>
</html>