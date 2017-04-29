<?php include('inc/head_no_auth.php'); ?>
<?php
if (isset($_GET['key']) && !empty($_GET['key']) && isset($_GET['download']) && $_GET['download'] == true) {
        $drivelink = mysql_escape_string($_GET['key']);
        $sql = 'SELECT * FROM drivelinks WHERE drivelink = "' . $drivelink . '"';
        $req = mysql_query($sql);

            if (mysql_num_rows($req) or $req) {
                while ($data = mysql_fetch_array($req)) {
                    $file = $data['name_file'];
                    $url = '/var/www/drive/files/' . $data['owner_token'] . '/' . $data['name_file'];
                    header('Content-Type: application/octet-stream');
                    header('Content-Transfer-Encoding: Binary');
                    header('Content-disposition: attachment; filename="' . basename($file) . '"');
                    header('X-Sendfile: ' . $url);
                }
            } else {
                ?>
                <br /><br /><center><h2>Aucuns fichier ne correspond à votre demande</h2><br /><br />
                <?php
            } 
} elseif (isset($_GET['key']) && !empty($_GET['key'])) {
    $drivelink = mysql_escape_string($_GET['key']);
        $sql = 'SELECT * FROM drivelinks WHERE drivelink = "' . $drivelink . '"';
        $req = mysql_query($sql);
    while ($data = mysql_fetch_array($req)) {
        $path = '/var/www/drive/files/'.$data['owner_token'].'/'.$data['name_file'];
        ?>
        <br /><br /><center><h2>Téléchargez <b><?php echo $data['title']; ?></b></h2><br /><p>Type de fichier: <b><?php echo pathinfo($path, PATHINFO_EXTENSION); ?></b></p><br /><a class="btn btn-default" href="https://drive.webmaker.fr/drivelinksdownload/<?php echo $_GET['key']; ?>">Télécharger le fichier avec mon navigateur</a>
        <a class="btn btn-danger" href="https://drive.webmaker.fr/drivelinksdownload/<?php echo $_GET['key']; ?>">Télécharger le fichier avec Drive+</a></center><br /><br />
        <?php
    }
} else {
     ?>
                <br /><br /><center><h2>Aucuns fichier ne correspond à votre demande</h2><br /><br />
                <?php
}

?>