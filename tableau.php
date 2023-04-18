<?php
    if(isset($_SESSION['joueur_1'], $_SESSION['joueur_2']) && $_SESSION['joueur_1'] != "" && $_SESSION['joueur_2'] != ""){ 
    include 'functions.php';
?>
        <div class="text-center w-full family py-6 text-sky-600 text-xs sm:text-base">le joueur <span class="text-red-600"><?php echo $_SESSION['joueur_1'] ?></span> commence la partie !</div>


        <form method='post' action='index.php' class="flex justify-center w-full">
            <table>
<?php              
                $case = 1;
                for($ligne = 0; $ligne < 3; $ligne++){
?>
                    <tr>
<?php
                        for($colone = 0; $colone < 3; $colone++){  
?>
                            <td class="border-2 border-sky-600 w-24 h-24 p-1">
                                <button class="w-full h-full" <?php disabled($case) ?> type="submit" name="<?php echo $case ?>" value="">
                                    <div class="flex justify-center items-center w-full h-full text-5xl <?php Color($case) ?>">
                                        <?php affichage($case) ?>
                                    </div>
                                </button>
                            </td>
<?php  
                            $case++;
                            include 'restart.php';
                        }
?>
                    </tr>
<?php 
                }
?>
                <br/>
            </table>
        </form>
        <form method="post" action="index.php" class="flex flex-col sm:flex-row w-full sm:justify-center items-center sm:gap-2 pt-8">
            <button class="text-red-600 text-sm bg-sky-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-bold rounded-full px-5 py-2.5 text-center  my-2 w-56" type='submit' name='restart'>Rejouer</button>
            <button class="text-sky-600 text-sm bg-red-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-bold rounded-full px-5 py-2.5 text-center my-2 w-56" type='submit' name='logout'>Déconnexion</button>
        </form>
<?php
    endGame();
    }else{ 
?>     
    <div class="w-full flex justify-center py-8 px-6">
        <div class="sm:w-1/4 w-full flex justify-center backdrop-opacity-10 bg-white/25 rounded-xl p-6">
            <form action='index.php' method='post' class="w-full">
                <div class="mb-6">
                    <label for="joueur_1" class="block mb-2 text-sm font-medium text-sky-600">Joueur 1 :</label>
                    <input type="text" id="joueur_1" name="joueur_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
                </div>
                <div class="mb-6">
                    <label for="joueur_2" class="block mb-2 text-sm font-medium text-red-600">Joueur 2 :</label>
                    <input type="text" id="joueur_2" name="joueur_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
                </div>
                <div class="w-full flex justify-center">
                    <button type='submit' class="text-white text-xl bg-sky-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-bold rounded-full px-5 py-2.5 text-center  mb-2 w-full" name='login'>Jouer</button>
                </div>
            </form>
        </div>
    </div>
<?php 
    }
?>
