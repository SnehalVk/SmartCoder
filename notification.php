<!doctype html>
<html ng-app="CodexApp">
<head>
    <title>Select Question</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- default css files -->

    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!--//web font-->

    <!-- scrolling script -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //scrolling script -->
    <style>
    input.username{
      border: 0px;
      background: white;
      width: 100px;
    }

    </style>

</head>

<!-- Body -->

<body>

    <!-- banner -->
    <div class="banner">
        <div class="header-top">
            <div class="container">
                <div class="header-top-right">
                <p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:ssditeam@gmail.com">ssditeam@gmail.com</a></p>
          <p><i class="fa fa-phone" aria-hidden="true"></i> (704) 191 9191</p>
                </div>
            </div>
        </div>
        <div class="head">
            <div class="container">
                <div class="navbar-top">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <div class="navbar-brand logo ">
                            <h1 class="animated wow pulse" data-wow-delay=".5s">
                                      <a href="index.html">Smart Coder</a></h1>
                        </div> -->

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav link-effect-4">
                            <li class="active"><a href="Dashboard.php?user=<?php echo $_GET['user']?>" data-hover="Dashboard">Dashboard</a> </li>
                            <!-- <li><a href="about.html" data-hover="About">About </a> </li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#428BCA;font-size:15px;">
                                  <?php

                                  if(isset( $_GET['user']))
                                  {$_SESSION['userid'] = $_GET['user'];
                                    $send_url = "?user=".$_SESSION['userid'];
                                  echo "<b><input name='userid' class='username' type='text' value = '".$_SESSION['userid']."' disabled='true'/> </b>";
                                  }
                                  ?>
                                  <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile.php<?php echo $send_url ?>"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                                    <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                                </ul>
                            </li>
                            <li><a href="notification.php<?php echo $send_url ?>"><span class="glyphicon glyphicon-bell"></span>Notifications</a></li>
                            <!-- <form class="navbar-form  navbar-right"> -->

                            <!-- </form> -->

                        </ul>
                    </div>

                    <body ng-controller="bzCtrl">
                        <nav class="navbar navbar-default navbar-fixed-top" style="background-color:white;border:color:#428BCA;">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- <a class="navbar-brand" style="color:#428BCA; font-size:25px; font-family:Times New Roman;border-color:#428BCA" href="#">Smart Coder</a> -->
                            </div>
                        </nav>
                        <br/>
                        <br/>
                        <br/>
                        <div class="container">

                            <section>
                                <div id="container_demo">
                                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->

                                    <div id="wrapper">

                                        <div id="login" class="animate form">

                                            <div class="container-fluid">
                                                <h4 style="color:#428BCA;">Questions posted by you. Select a question below to answer</h4> <br>
                                                <?php
$act = "/edit.php".$send_url;
$con = mysqli_connect("localhost", "root", "root123", "Codex");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$notif = "select * from queavail where Userid='".$_SESSION['userid']."'";
$result = mysqli_query($con, $notif);
$res    = mysqli_query($con, "SELECT * FROM question");
while ($row = mysqli_fetch_array($result)) {
    echo '<div class="list-group">
          <a class="list-group-item">' . $row['Qname'] . '</a><a href="edit.php/'.$send_url.'&id=' . $row['Qid'] . '&amp;quepostid=' . $row['Qid'] . '" role="button"  class="btn btn-primary btn-xs pull-right" style="color:white" >

          Post</a></div>';
}
while ($row = mysqli_fetch_array($res)) {
    echo '<div class="list-group">
          <a class="list-group-item">' . $row['Qname'] . '</a><a href="' . $act . '?id=' . $row['Qid'] . '&amp;quepostid=' . $row['id'] . '" role="button"  class="btn btn-primary btn-xs pull-right" >

          Post</a></div>';
}
?>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

         <script src="js/jquery/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/angular/angular.min.js"></script>
        <script src="js/bzapp.js"></script>
            </body>
</html>
