<?php
    if(!isset($_SESSION['symbol'])){
        $_SESSION['symbol'] = "X";
    }

    if(isset($_POST['login'])){
        $_SESSION['joueur_1'] = $_POST['joueur_1'];
        $_SESSION['joueur_2'] = $_POST['joueur_2'];
        setcookie('round', 0, time()+3600);
        header("Refresh:0");
    }else if(isset($_POST['logout'])){
        unset($_SESSION['joueur_1']);
        unset($_SESSION['joueur_2']);
        session_destroy();
        header("Refresh:0");
    }

    if(isset($_POST['logout'])){
        foreach($_COOKIE as $cookie_case => $cookie_value){
            setcookie($cookie_case, '', time()-3600);
            unset($_COOKIE[$cookie_case]);
            header('Refresh:0');
        }
    }
?>