<?php include('inc/autoload.php'); ?>
<?php
if ($user->username()) {
    if ($user->accountType() != 'UTILISATEUR') { $path = 'files/'.$user->key().'/'; } else { $path = 'files/'.$user->key().'/'.$user->username().'/'; }
    $file = $path.$_GET['path'];
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: Binary');
    header('Content-disposition: attachment; filename="' . basename($file) . '"');
    header('X-Sendfile: ' . $file); 
} else {
    header('location: http://drive.webmaker.fr/');
}
?>