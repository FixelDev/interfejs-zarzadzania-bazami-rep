<!DOCTYPE html>
<html lang="pl">
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
            <h3>Połącz z bazą danych</h3> 
            <div class="wysrodkowanieZawartosci">
                <form action="kreatorBazyDanych.php" method="post">
                    <input type="text" id="nazwaSerwera" name="nazwaSerwera" placeholder="Nazwa serwera"> <br>
                    
                    <input type="text" id="nazwaUzytkownika" name="nazwaUzytkownika" placeholder="Nazwa użytkownika"> <br>
                    
                    <input type="text" id="haslo" name="haslo" placeholder="Hasło"> <br>

                    <input type="text" id="haslo" name="listaBazDanychDoKreatora" placeholder="Nazwa bazy danych"> <br>

                    <input type="submit" value="Połącz" class="przycisk">
                </form>
            </div>
           
        </article>
    </main> 

    <footer>
        <button class="przycisk" id="przyciskPowrot" onClick="zaladujStrone('http://localhost/baza_danych/index.php');"><i class="icon-left-big"></i></button>
    </footer>
</body>
</html>