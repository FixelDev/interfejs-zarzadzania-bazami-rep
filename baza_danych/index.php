<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <main>
    
        <article>
            
        <h3>Wybierz rodzaj połączenia:</h3>
            <div class="wysrodkowanieZawartosci">
                <form action="serwer.php" method="post">
                    <input type="submit" class="przyciskWyboruPolaczenia" id="przyciskSerwer">
                </form>
                
                <form action="bazaDanych.php" method="post">
                    <input type="submit" class="przyciskWyboruPolaczenia"id="przyciskBazaDanych">
                </form>
            </div>
           
        </article>
    </main>

</body>
</html>