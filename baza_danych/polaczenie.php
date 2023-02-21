<?php
    session_start();

    if(isset($_POST["nazwaSerwera"]))
    {
        $_SESSION["nazwaSerwera"] = $_POST["nazwaSerwera"];
        $_SESSION["nazwaUzytkownika"] = $_POST["nazwaUzytkownika"];
        $_SESSION["haslo"] = $_POST["haslo"];
    }
        

    $polaczenie = mysqli_connect($_SESSION["nazwaSerwera"], $_SESSION["nazwaUzytkownika"], $_SESSION["haslo"]);
    $_SESSION["polaczenie"] = $polaczenie;

?>