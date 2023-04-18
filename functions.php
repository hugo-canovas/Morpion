<?php 

include 'connexion.php';

// affichage de X ou O dans les cases
function affichage($case){
    if(isset($_COOKIE[$case])){
        echo $_COOKIE[$case];
    }
}

// Disable les cases après sélection ou arrêt du jeu
function disabled($case){
    if(isset($_COOKIE[$case])){
        echo 'disabled';
    } else if(winner()){
        echo 'disabled';
    }
}

// Attribution des X ou O suivant le tour
function attributionSymbol($case){
    if($_SESSION['symbol'] == "X"){
        setcookie($case, $_SESSION['symbol'], time()+3600);
        $_SESSION['symbol'] = "O";
        header('Refresh:0');
    }else if($_SESSION['symbol'] == "O"){
        setcookie($case, $_SESSION['symbol'], time()+3600);
        $_SESSION['symbol'] = "X";
        header('Refresh:0');
    }
}

// Attribution de couleur X et O
function Color($case){
    if($_COOKIE[$case] == "X"){
        echo "text-sky-600";
    }else if($_COOKIE[$case] == "O"){
        echo "text-red-600";
    }
}

// Compteur de round
function playerRound($case){
    if(isset($_POST[$case])){
        attributionSymbol($case);
        if(isset($_COOKIE['round'])){
            setcookie('round', $_COOKIE['round']+1, time()+3600);
        }
    }
}
playerRound(1);
playerRound(2);
playerRound(3);
playerRound(4);
playerRound(5);
playerRound(6);
playerRound(7);
playerRound(8);
playerRound(9);

// conditions de victoire
function winner(){
    if(isset($_COOKIE[1], $_COOKIE[2], $_COOKIE[3])){
        if($_COOKIE[1] == "X" && $_COOKIE[1] == $_COOKIE[2] && $_COOKIE[1] == $_COOKIE[3]){
            return 1;
        }else if($_COOKIE[1] == "O" && $_COOKIE[1] == $_COOKIE[2] && $_COOKIE[1] == $_COOKIE[3]){
            return 2;
        }
    }
    if(isset($_COOKIE[4], $_COOKIE[5], $_COOKIE[6])){
        if($_COOKIE[4] == "X" && $_COOKIE[4] == $_COOKIE[5] && $_COOKIE[4] == $_COOKIE[6]){
            return 1;
        }else if($_COOKIE[4] == "O" && $_COOKIE[4] == $_COOKIE[5] && $_COOKIE[4] == $_COOKIE[6]){
            return 2;
        }
    }
    if(isset($_COOKIE[7], $_COOKIE[8], $_COOKIE[9])){
        if($_COOKIE[7] == "X" && $_COOKIE[7] == $_COOKIE[8] && $_COOKIE[7] == $_COOKIE[9]){
            return 1;
        }else if($_COOKIE[7] == "O" && $_COOKIE[7] == $_COOKIE[8] && $_COOKIE[7] == $_COOKIE[9]){
            return 2;
        }
    }
    if(isset($_COOKIE[1], $_COOKIE[4], $_COOKIE[7])){
        if($_COOKIE[1] == "X" && $_COOKIE[1] == $_COOKIE[4] && $_COOKIE[1] == $_COOKIE[7]){
            return 1;
        }else if($_COOKIE[1] == "O" && $_COOKIE[1] == $_COOKIE[4] && $_COOKIE[1] == $_COOKIE[7]){
            return 2;
        }
    }
    if(isset($_COOKIE[2], $_COOKIE[5], $_COOKIE[8])){
        if($_COOKIE[2] == "X" && $_COOKIE[2] == $_COOKIE[5] && $_COOKIE[2] == $_COOKIE[8]){
            return 1;
        }else if($_COOKIE[2] == "O" && $_COOKIE[2] == $_COOKIE[5] && $_COOKIE[2] == $_COOKIE[8]){
            return 2;
        }
    }
    if(isset($_COOKIE[3], $_COOKIE[6], $_COOKIE[9])){
        if($_COOKIE[3] == "X" && $_COOKIE[3] == $_COOKIE[6] && $_COOKIE[3] == $_COOKIE[9]){
            return 1;
        }else if($_COOKIE[3] == "O" && $_COOKIE[3] == $_COOKIE[6] && $_COOKIE[3] == $_COOKIE[9]){
            return 2;
        }
    }
    if(isset($_COOKIE[1], $_COOKIE[5], $_COOKIE[9])){
        if($_COOKIE[1] == "X" && $_COOKIE[1] == $_COOKIE[5] && $_COOKIE[1] == $_COOKIE[9]){
            return 1;
        }else if($_COOKIE[1] == "O" && $_COOKIE[1] == $_COOKIE[5] && $_COOKIE[1] == $_COOKIE[9]){
            return 2;
        }
    }
    if(isset($_COOKIE[3], $_COOKIE[5], $_COOKIE[7])){
        if($_COOKIE[3] == "X" && $_COOKIE[3] == $_COOKIE[5] && $_COOKIE[3] == $_COOKIE[7]){
            return 1;
        }else if($_COOKIE[3] == "O" && $_COOKIE[3] == $_COOKIE[5] && $_COOKIE[3] == $_COOKIE[7]){
            return 2;
        }
    }
}

// Attribution de victoire/égalité    
function endGame(){
    if(winner()== 1){
        echo '<div class="absolute top-1/2 left-[30%] backdrop-opacity-10 bg-white/30 text-3xl px-4 py-8"><span class="text-sky-600">'.$_SESSION['joueur_1'].'</span> est le gagnant</div>';
    }else if(winner()== 2){
        echo '<div class="absolute top-1/2 left-[30%] backdrop-opacity-10 bg-white/30 text-3xl px-4 py-8"><span class="text-red-600">'.$_SESSION['joueur_2'].'</span> est le gagnant</div>';
    }else if(isset($_COOKIE['round']) && $_COOKIE['round'] == 9){
        echo '<div class="absolute top-1/2 left-[40%] backdrop-opacity-10 bg-white/40 text-3xl px-4 py-8">Egalité !</div>';
    }
}

?>