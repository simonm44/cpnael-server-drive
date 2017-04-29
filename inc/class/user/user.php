<?php

    SESSION_START();

        require('inc/class/MySQL/mysql.php');
        $MySQL = new MysqlTools;

        if ($MySQL->MySQLAuth("localhost", "", "", "gestion.webmaker.fr")) {/* Good Job! */} else {echo "Error login MySQL !"; exit();}

    class user {
        public function key() {
            if (isset($_SESSION['user_basic_key'])) {
                return $_SESSION['user_basic_key'];
            } else {
                return false;
            }
        }
        public function username() {
            return $_SESSION['user_basic_username'];
        }
        public function firstname() {
            return $_SESSION['user_basic_firstname'];
        }
        public function lastname() {
            return $_SESSION['user_basic_lastname'];
        }
        public function accountType() {
            return $_SESSION['user_basic_account_type'];
        }

        public function GetServers($userkey) {
            $sql = 'SELECT * FROM servers WHERE owner_token = "'.$userkey.'"';
            $req = mysql_query($sql)or exit(mysql_error());
            $string = '';
                while ($data = mysql_fetch_array($req)) {
                    $string .= '<tr><td>'.$data['name'].'</td><td>'.$data['description'].'</td><td>'.$data['ip_adress'].'</td><td><a class="btn btn-default" href="https://engine.webmaker.fr/my/serveurs">ADMINISTRATION</a></td></tr>';
                }
                if ($string == "") {
                    return '<div class="col-sm-6"><br /><div class="alert alert-danger"><div class="container-fluid"><div class="alert-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span></button><b>Oops...</b> Pas de serveurs disponible !</div></div></div>';
                } else {
                    return $string;
                }
            }
        }

?>
