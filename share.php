<?php include('inc/head.php'); ?>
<?php

  function random($car) {
  $string = "";
  $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
  srand((double)microtime()*1000000);
  for($i=0; $i<$car; $i++) {
  $string .= $chaine[rand()%strlen($chaine)];
}
return $string;
}
  if ($user->accountType() != 'UTILISATEUR') { $key = $user->key(); } else { $key = $user->key().'/'.$user->username(); }
    if ($drive->share($key, $_GET['path']) != false) {
      echo '<div class="content">
    <center><h2>Partagez vos fichier simplement avec <b>Drive+</b></h2></center><br /><br />

        <br /><br /><center><h3>Création d\'un lien de téléchargement:<br /></h3></center><br />
        <center><p>Lien : <a href="https://drive.webmaker.fr/drivelinks/' . $drive->share($key, $_GET['path']) . '">https://drive.webmaker.fr/drivelinks/' . $drive->share($key, $_GET['path']) . '</a></p></center>
     </div>';
    } else {
      $string = random(50);
      $drive->addShare($key, $_GET['path'], $string);
      echo '<div class="content">
    <center><h2>Partagez vos fichier simplement avec <b>Drive+</b></h2></center><br /><br />

        <br /><br /><center><h3>Création d\'un lien de téléchargement:<br /></h3></center><br />
        <center><p>Lien : <a href="https://drive.webmaker.fr/drivelinks/' . $string . '">https://drive.webmaker.fr/drivelinks/' . $string . '</a></p></center>
     </div>';
    }

?>
<?php include('inc/foot.php'); ?>