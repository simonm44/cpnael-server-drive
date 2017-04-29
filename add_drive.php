<?php include('inc/head.php'); ?>
<?php

    if ($drive->firstlogintest($user->key(), $user->accountType(), $user->username())) {
        echo '<br /><br /><br /><center><h2>Chargement de Drive+ . . .</h2><h4>merci de patienter quelques secondes</h4></center>';

        if ($user->accountType() != 'UTILISATEUR') {
            $path = 'files/'.$user->key().'/';
        } else {
            $path = 'files/'.$user->key().'/'.$user->username().'/';
        }
        if (mkdir($path, 0755)) {
            $file = 'files/tuto.pdf';
            $newpath = 'files/'.$user->key().'/tutoriel.pdf';

            if (copy($file, $newpath)) {
                echo '<meta http-equiv="refresh" content="2; URL=/mon-drive/">';
            }
        }

    } else {
        header('location: http://drive.webmaker.fr/');
        exit();
    }

?>
<?php include('inc/foot.php'); ?>