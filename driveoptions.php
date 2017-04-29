<?php include('inc/head.php'); ?>

    <div class="content">
        <center><h2>Stocker les données sur un serveur privé</h2></center><br />
            <table class="table">
	            <thead class="text-primary">
	                <th>Nom</th>
	                <th>Description</th>
	                <th>IP</th>
			        <th>Options</th>
	            </thead>
	            <tbody>
                 <?php echo $user->GetServers($user->key()); ?>
               </tbody>
            </table>

        <br /><a href="https://engine.webmaker.fr/add/serveurs/" class="btn btn-info">AJOUTER UN SERVEUR</a>
    </div>

<?php include('inc/foot.php'); ?>