<?php include('inc/head.php'); ?>
<?php if (isset($_GET['trash']) && $_GET['trash'] == "success") { $newnotification .= $notifications->basic_create('Drive+', 'Votre fichier à bien éré supprimer !', 'info', 5); } ?>
    <?php if ($drive->firstlogintest($user->key(), $user->accountType(), $user->username())) { ?>
    <div class="content">
       <center><h2>Première connexion . . .</h2><h3>Bienvenue, <?php echo $user->firstname().' '.$user->lastname(); ?></h3><br /></center>
            <br /><p>
                <center><p>En cliquant sur la bouton <i>Créer un espace Drive+</i><br> vous admettez avoir lu et accepté les <a href="http://webmaker.fr/conditions">conditions générales d'utilisation</a></p><br /><a class="btn btn-success" href="/service/drive/add/">Créer un espace Drive+</a></center>
            </p>
    </div>
    <?php } else { ?>
    <?php if(isset($_GET['trash']) && !empty($_GET['trash'])) { if ($drive->trash($_GET['trash'], $user->key())) { header('location: /mon-drive/success'); } else { $newnotification .= $notifications->basic_create('Drive+', 'Votre fichier n\'a pas été supprimer, contactez votre administrateur pour plus d\'informations !', 'danger', 5); } } ?>
    <div class="content">
            <table class="table">
	            <thead class="text-primary">
	                <th>Nom du fichier</th>
	                <th>Type de fichier</th>
			        <th>Options</th>
	            </thead>
	            <tbody>
                 <?php if ($user->accountType() != 'UTILISATEUR') { $mydir = 'files/'.$user->key().'/'; } else { $mydir = 'files/'.$user->key().'/'.$user->username().'/'; } echo $drive->scan($mydir, $user->key()); ?>
               </tbody>
            </table>
            <br /><br /><a class="btn btn-primary" href="/upload/">Envoyer des fichier sur Drive+</a><br />
    </div>
    <?php } ?>
<?php include('inc/foot.php'); ?>