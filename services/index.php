<?
if(!isset($_SESSION)){
    session_start();
}

require_once("include/Usuario.php");
$oUsuario = new Usuario();

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
                <div id="home_logo"></div>
                <hr>
                <p>Do you have a project that helps solve the needs of your city?<br/>Our HelpBuddies can save you!</p>
                <?php if ($_SESSION['FBID']){ 
                    $id_usuario =$_SESSION['FBID'];
                    $nombre     =$_SESSION['FULLNAME'];
                    $email      =$_SESSION['EMAIL'];
                    $foto       ="https://graph.facebook.com/".$_SESSION['FBID']."/picture";
                    

                    $isUsuario = $oUsuario->isUsuario($id_usuario);
                    if($isUsuario == 0){
                        $oUsuario->insertUsuario($id_usuario, $nombre, $email, $foto);
                    }else{
                        $oUsuario->updateUsuario($id_usuario, $nombre, $email, $foto);
                    }
                    $datosUsuario = $oUsuario->getUsuario($id_usuario);

                    ?>
                    <script type="text/javascript">window.location="home.php"</script>
                <div id="home_user_box">
                    <ul>
                        <li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
                        <li style="margin-top: 30px;">
                            <?php echo  $_SESSION['FULLNAME']; ?><br/>
                            <a href="facebook/logout.php">LogOut</a>
                        </li>
                    </ul>
                    <div class="home_btn" id="home_projects_to_help">Projects to Help</div>
                    <div class="home_btn" id="home_my_projects">My Projects</div>
                    <div class="home_btn" id="home_add_project">Add Project</div>
                </div>
                <?php }else{ ?>
                    <a href="facebook/fbconfig.php"><div id="facebook_btn"></div></a>
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
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
