<?
if(!isset($_SESSION)){
    session_start();
}

require_once("include/Usuario.php");
$oUsuario = new Usuario();

$id_usuario = $_SESSION['FBID'];
$usuario_data = $oUsuario->getUsuario($id_usuario);

$points = $usuario_data[0]['puntos'];
$level  = $usuario_data[0]['nivel'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HelpBuddies</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <header>
        <div class="header-content" id="login">
            <div class="header-content-inner">
                <?php if ($_SESSION['FBID']){ ?>
                    <div id="home_logo_small"></div>
                    <div id="home_big_box"></div>
                    <div id="home_user_box_back"></div>
                    <div id="home_user_box" onmouseover="showLogout();"></div>
                    <a href="facebook/logout.php">
                        <div id="home_logout" onmouseout="hideLogout();">logout X</div>
                    </a>
                    <div id="home_user_photo"></div>
                    <div id="home_user_name"><?php echo  $_SESSION['FULLNAME']; ?></div>
                    <div id="home_user_points"><?=$points;?> points</div>
                    <div id="home_user_level_back"></div>
                    <div id="home_user_level"></div>
                    <div id="home_user_level_prev">Level <?=$level?></div>
                    <div id="home_user_level_next">Level <?=($level+1)?></div>
                    <div id="home_user_bar"></div>
                    <div id="home_user_badges">
                        <div class="home_badge" id="home_user_badge01"></div>
                        <div class="home_badge" id="home_user_badge02"></div>
                        <div class="home_badge" id="home_user_badge03"></div>
                        <div class="home_badge" id="home_user_badge04"></div>
                        <div class="home_badge" id="home_user_badge05"></div>
                    </div>
                    <div id="home_buttons">
                        <div class="home_btn" id="home_projects_to_help">Projects to Help</div>
                        <div class="home_btn" id="home_my_projects">My Projects</div>
                        <div class="home_btn" id="home_add_project" onClick="setProyectoInsertForm();">Add Project</div>
                    </div>
                    <div id="contenido"></div>
                 <?php }else{ ?>
                    <script type="text/javascript">window.location="index.php"</script>
                <? } ?>
            </div>
        </div>
    </header>

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?&sensor=FALSE"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/functions.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
    <script type="text/javascript">setFotoPrincipal("http://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=400&height=400");</script>
    <script type="text/javascript">showLevel(<?=$points;?>)</script>
</body>

</html>
