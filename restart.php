<?php
    if(isset($_POST['restart'])){
        setcookie(1, '', time()-3600);
        setcookie($case, '', time()-3600);
        setcookie('round', '', time()-3600);
        unset($_SESSION['symbol']);
        foreach($_COOKIE as $cookie_case => $cookie_value){
            setcookie($cookie_case, '', time()-3600);
            unset($_COOKIE[$cookie_case]);
        }
        setcookie('round', 0, time()+3600);
        error_reporting(0);
        header('Refresh:0');
    }
?>