<?php include('inc/head.php'); ?>
    <?php
    if (isset($_FILES["file"]) && is_uploaded_file($_FILES["file"]["tmp_name"])) {
    if ($user->accountType() != 'UTILISATEUR') { $path = 'files/'.$user->key().'/'; } else { $path = 'files/'.$user->key().'/'.$user->username().'/'; }
        $repertoireDestination = $path;
        $nomDestination        = $_FILES["file"]['name'];

            if (rename($_FILES["file"]["tmp_name"],
                        $repertoireDestination.$nomDestination)) {
                $newnotification .= $notifications->basic_create('Drive+', 'Votre fichier à bien été envoyer ! (Vous allez ètre rediriger sur le drive dans 2 secondes)', 'info', 2);
                echo '<meta http-equiv="refresh" content="2; URL=/mon-drive/">';
            } else {
                $newnotification .= $notifications->basic_create('Drive+', 'Votre fichier n\a pas été envoyer, contactez votre administrateur pour plus d\'informations. ', 'danger', 2);
            }          
    }
?>

    <br /><br /><center><h3>Cliquer sur l'ovale bleu <i><b>ou</b></i> glisser déposer votre fichier</h3></center>
    <form enctype="multipart/form-data" method="post">
      <center><input type="hidden" name="MAX_FILE_SIZE" value="1073741824" />
      <br /><br /><span class="btn btn-primary btn-file"><input clas="btn btn-success" type="file" name="file" /></span><br /><br />
      <input class="btn btn-success" value="Envoyer le fichier sur Drive+" type="submit" /></center>
    </form>
<?php include('inc/foot.php'); ?>