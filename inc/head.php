<?php include('inc/autoload.php'); ?><?php if (!isset($_SESSION['user_basic_username'])) { header('location: https://engine.webmaker.fr/'); exit(); } ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Drive+ | WebMakerFr</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="https://drive.webmaker.fr/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="https://drive.webmaker.fr/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="https://drive.webmaker.fr/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="https://drive.webmaker.fr/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="https://drive.webmaker.fr/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="https://drive.webmaker.fr/assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="https://www.webmaker.fr/" class="simple-text">
                    WEB<b>MAKER</b>FR
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/dashboard/">
                        <i class="fa fa-dashboard"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
                <li>
                    <a href="/mon-drive/">
                        <i class="pe-7s-cloud-upload"></i>
                        <p>Mon Drive</p>
                    </a>
                </li>
                <?php if ($user->accountType() != 'UTILISATEUR') { ?>
                <li>
                    <a href="/mon-compte/">
                        <i class="pe-7s-user"></i>
                        <p>Mon compte</p>
                    </a>
                </li>
                <li>
                    <a href="/options-drive/">
                        <i class="pe-7s-tools"></i>
                        <p>Options Drive+</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="https://engine.webmaker.fr/">
                        <i class="pe-7s-rocket"></i>
                        <p>Retour sur ENGINE</p>
                    </a>
                </li>
                <?php } ?>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Drive+</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="pe-7s-rocket"></i>
                                    <b class="caret"></b>
                                    <?php $notification = $notifications->GetNumbers($user->key(), $user->accountType()); if ($notification != "0") { ?><span class="notification"><?php echo $notification; ?></span><?php } ?>
                              </a>
                              <ul class="dropdown-menu">
                                <?php echo $notifications->get($user->key(), $user->accountType()); ?>
                              </ul>
                        </li>
                        <li>
                           <a href="https://www.webmaker.fr/fr/?s=">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="https://engine.webmaker.fr/logout.php">
                                Déconnexion de la session <b><?php echo $user->username(); ?></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>