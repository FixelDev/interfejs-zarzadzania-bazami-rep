<?php
    session_start();

    if(isset($_POST['listaBazDanychDoKreatora']))
    {
        $_SESSION['nazwaWybranejBazyDanych'] = $_POST['listaBazDanychDoKreatora'];

        if(empty($_SESSION["nazwaSerwera"]))
        {
            $_SESSION["nazwaSerwera"] = $_POST['nazwaSerwera'];
            $_SESSION["nazwaUzytkownika"] = $_POST['nazwaUzytkownika'];
            $_SESSION["haslo"] = $_POST['haslo'];
            
        }
    }
    
    $polaczenieBazaDanych = mysqli_connect($_SESSION["nazwaSerwera"], $_SESSION["nazwaUzytkownika"], $_SESSION["haslo"], $_SESSION['nazwaWybranejBazyDanych']);
    $_SESSION['polaczenieBazaDanych'] = $polaczenieBazaDanych;
?>