<?php

    class MysqlTools {
        public function MySQLAuth($hote, $username, $password, $database) {
            $bdd = mysql_connect($hote, $username, $password);
            if (mysql_select_db($database, $bdd)) {
                return true;
            } else {
                return false;
            }
        }
    }

?>