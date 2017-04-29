<?php

    class drive {
        public function scan($dir, $userkey) {
         if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if( $file != '.' && $file != '..') {
                    $fileurl = $dir.'/'.$file;
                    $filetype = pathinfo($fileurl, PATHINFO_EXTENSION);
                    $filetype2 = pathinfo($fileurl, PATHINFO_EXTENSION);
                    if ($filetype == "") {
                        $filetype = '<i>répertoire</i>';
                    } else {
                        $filetype = '<i>' . $filetype . '</i>';
                    }
                    if (!is_dir($dir.$file)) {
                    if ($filetype2 == "") {
                        echo '<tr><td>' . basename($file) . '</td><td>' . $filetype . '</td><td><a class="btn btn-warning" href="/partager/' . $file . '">Partager</a> - <a class="btn btn-info" href="/download.php?path=' . $file . '">Télécharger</a> - <a class="btn btn-danger" href="/mon-drive/' . $dir . $file . '">Supprimer</a></td></tr>';
                    } elseif ($filetype2 == "png" or $filetype2 == "jpg" or $filetype2 == "jpeg" or $filetype2 == "gif" or $filetype2 == "PNG" or $filetype2 == "JPG" or $filetype2 == "JPEG" or $filetype2 == "GIF") {
                        echo '<tr><td>' . basename($file) . '</td><td>' . $filetype . '</td><td><a class="btn btn-warning" href="/partager/' . $file . '">Partager</a> - <a class="btn btn-primay" href="/visionner/' . $file .'">Visionner</a> - <a class="btn btn-info" href="/download.php?path=' . $file . '">Télécharger</a> - <a class="btn btn-danger" href="/mon-drive/' . $dir . $file . '">Supprimer</a></td></tr>';
                    } else {
                        echo '<tr><td>' . basename($file) . '</td><td>' . $filetype . '</td><td><a class="btn btn-warning" href="/partager/' . $file . '">Partager</a> - <a class="btn btn-info" href="/download.php?path=' . $file . '">Télécharger</a> - <a class="btn btn-danger" href="/mon-drive/' . $dir . $file . '">Supprimer</a></td></tr>';
                    }
                    }
                    }
                }
                closedir($dh);
            }
            }
        }
        public function firstlogintest($userkey, $accountType, $username) {
            if ($accountType != 'UTILISATEUR') {
                $dir = 'files/' . $userkey . '/';
            } else {
                $dir = 'files/' . $userkey . '/' . $username . '/';
            }
            if (!file_exists($dir)) {
                return true;
            } else {
                return false;
            }
        }
        public function trash($link, $userkey) {
            if (strstr($link, $userkey)) {
                if (unlink($link)) {
                    return true;
                } else {
                    return false;
                }        
            }
        }
        public function share($key, $name_file) {
            $sql = 'SELECT * FROM drivelinks WHERE owner_token = "' . $key . '" AND name_file = "' . $name_file . '"';
            $req = mysql_query($sql);
                if (mysql_num_rows($req)) {
                 $return = '';
                    while ($data = mysql_fetch_array($req)) {
                        $return = $data['drivelink'];
                    }
                    return $return;
                } else {
                    return false;
                }
        }

 
        public function addShare($key, $file_name, $string) {
            $sql = 'INSERT INTO drivelinks (id, title, description, drivelink, owner_token, name_file) VALUES ("", "' . basename($file_name) . '", "fichier partager avec Drive+", "' . $string . '", "' . $key . '", "' . $file_name . '")';
            if (mysql_query($sql)) {
                return true;
            } else {
                return false;
            }
        }


    }

?>