<?php include('inc/head.php'); if ($user->accountType() != 'UTILISATEUR') { $path = 'files/'.$user->key().'/'; } else { $path = 'files/'.$user->key().'/'.$user->username().'/'; } ?>
    <center><h2>Visionneuse d'image <b>Drive+</b></h2></center>
    <br /><center><img src="<?php echo 'https://drive.webmaker.fr/'.$path.$_GET['path']; ?>" alt="Mon image"></center>
<?php include('inc/foot.php'); ?>