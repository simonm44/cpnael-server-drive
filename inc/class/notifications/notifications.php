<?php

    class notifications {
        public function basic_create($title, $message, $type, $time, $icon = null) {
            $message = '<b>' . $title . '</b> | '.$message;
            $time = $time.'000';
            if ($type == 'info') { $icon = 'pe-7s-note'; } elseif ($type == 'danger') { $icon = 'pe-7s-attention'; } elseif ($icon == null) { return "icon-not-found"; }
            $notification = 'notifications("' . $message . '", "' . $type . '", ' . $time . ', "' . $icon . '");';
            if (!empty($notification)) {
                return $notification;
            }
        }

        public function GetNumbers($userkey, $type) {
            $userkey = mysql_real_escape_string($userkey);
            if($type == "SUPERADMIN") {
                $sql = 'SELECT * FROM notifications WHERE (owner_token = "'.$userkey.'" OR owner_token = "public" OR owner_token = "admins")';
            } else {
                $sql = 'SELECT * FROM notifications WHERE (owner_token = "'.$userkey.'" OR owner_token = "public")';
            }
            $query = mysql_query($sql)or exit(mysql_error());
            $d = mysql_num_rows($query);
            if ($d == NULL) {
                 return "0";
            } else {
                 return $d;
            }
        }
        public function get($userkey, $type) {
                if($type == "SUPERADMIN") {
                    $sql = 'SELECT * FROM notifications WHERE (owner_token = "'.$userkey.'" OR owner_token = "public" OR owner_token = "admins")';
                } else {
                    $sql = 'SELECT * FROM notifications WHERE (owner_token = "'.$userkey.'" OR owner_token = "public")';
                }   
                $req = mysql_query($sql);
                $string = '';
                if (mysql_num_rows($req)) {
                    while ($data = mysql_fetch_array($req)){
                      if ($data['type'] == 'default') {
                            $string .= '<li><a href="'.$data['url'].'">'.$data['title'].'</a></li>';
                      } elseif ($data['type'] == 'danger') {
                            $string .= '<li><a href="'.$data['url'].'"><font color="red">'.$data['title'].'</font></a></li>';
                      }
                    }
                    return $string;
                } else {
                    return '<li><a>Pas de notifications</a></li>';
                }
        }
    }

?>