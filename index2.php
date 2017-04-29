<?php

        SESSION_START();

        $hote = "localhost";
        $user = "OjJDkmEeZ8kSCDd6";
        $pass = "y7YI3xOXUpak2CAZBaRZYXWc1ViFVlaxCNYMHhNh9nRYAc6zgrIRfAJdYQ8HbsSGvttfq2rcQZGZB4xBRj1zpiE0qoKstC2WqODTipLPcQUy7FM11y6eWrdM0yI8ejXd";
        $database = "gestion.webmaker.fr";
        
        $bdd = mysql_connect($hote, $user, $pass);
            if (mysql_select_db($database, $bdd)) {
                
                /* Good Job ! */
            } else {
                echo 'MySQL error';
                exit();
            }

    if (isset($_GET['token']) && $_GET['token'] == "6Cb78T2xneF92vcvYh3E3TNk8icM3U63TJpJMp6J8kwkPG76dSHL6W9UJ6fU73PJ6fU73PJ6fU73PqdJJ6fU92vcvYh373P6fU73Pqr796U4LHL6W9UqdJHL6W9UqdJHL6W9UqdJHL6W9UqdJDf672" && !isset($_GET['subusers'])) {
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $username = $_GET['username'];

			 $sql = 'SELECT * FROM users WHERE username = "'.$username.'"';
			 $req = mysql_query($sql);


			 if(mysql_num_rows($req)){
    			 while ($data = mysql_fetch_array($req)) {
					$_SESSION['user_basic_username'] = $data['username'];
					$_SESSION['user_basic_key'] = $data['mytoken'];
					$_SESSION['user_basic_firstname'] = $data['firstname'];
					$_SESSION['user_basic_lastname'] = $data['lastname'];
                    $_SESSION['user_basic_account_type'] = $data['account_type'];

					header('Location: /dashboard/');
                 }
             } else {
                 header('Location: https://www.webmaker.fr/cpanel');
             }
        }
    } elseif (isset($_GET['token']) && $_GET['token'] == "6Cb78T2xneF92vcvYh3E3TNk8icM3U63TJpJMp6J8kwkPG76dSHL6W9UJ6fU73PJ6fU73PJ6fU73PqdJJ6fU92vcvYh373P6fU73Pqr796U4LHL6W9UqdJHL6W9UqdJHL6W9UqdJHL6W9UqdJDf672" && isset($_GET['subusers']) && $_GET['subusers'] == true) {
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $username = $_GET['username'];

			 $sql = 'SELECT * FROM subusers WHERE username = "'.$username.'"';
			 $req = mysql_query($sql);


			 if(mysql_num_rows($req)){
    			 while ($data = mysql_fetch_array($req)) {
					$_SESSION['user_basic_username'] = $data['username'];
					$_SESSION['user_basic_key'] = $data['owner_token'];
					$_SESSION['user_basic_firstname'] = $data['firstname'];
					$_SESSION['user_basic_lastname'] = $data['lastname'];
                    $_SESSION['user_basic_account_type'] = $data['user_type'];

					header('Location: /dashboard/');
                 }
             } else {
                die();
             }
        }
    }

?>