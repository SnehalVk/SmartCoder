<!doctype html>
<html ng-app="CodexApp">

<head>
  <title>Codex: Dashboard</title>

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/codexApp.css" />
  <title>Smart Coder a Coding Ground for Students | Home :: Group 4</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="keywords" content="Smart Coder a Responsive coding ground, Bootstrap coding grounds, Flat coding grounds, Android Compatible coding ground,
Smartphone Compatible coding ground, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

  <!-- default css files -->
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <!-- default css files -->

  <!--web font-->
  <link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
  <!--//web font-->
  <script src="js/jquery-2.1.4.min.js"></script> 

  <style>
input.username{
  border: 0px;
  background: white;
  width: 100px;
}


</style>

</head>
<body>

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
        <div class="navbar-top" >
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
            <!-- <div class="navbar-brand logo ">
              <h1 class="animated wow pulse" data-wow-delay=".5s" style="margin-left:12px;">
									<a href="index.html"> Smart Coder</a></h1>
            </div> -->

          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav link-effect-4">
              <li><a href="Dashboard.php?user=<?php echo $_GET['user']?>" data-hover="Dashboard">Dashboard</a> </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#428BCA;font-size:15px;">

                  <?php
                  if(isset( $_GET['user']))
                  {$_SESSION['userid'] = $_GET['user'];
                  echo "<b><input name='userid' class='username' type='text' value = '".$_SESSION['userid']."' disabled='true'/> </b>";
                  }
                  ?>
  
                  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="profile.php?user=<?php echo $_SESSION['userid']?>"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                  <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                </ul>
              </li>
              <li><a href="notification.php?user=<?php echo $_SESSION['userid']?>"><span class="glyphicon glyphicon-bell"></span>Notifications</a></li>
            </ul>
          </div>
    <body ng-controller="bzCtrl">
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color:white;border:color:#428BCA;">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                </button>
              </div>
            </nav>
            <br/>
            <br/>
            <br/>
            <div class="container">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<fieldset>

<!-- Form Name -->
<legend>My Profile -> Account setting</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Change Email ID</label>
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="your current email " class="form-control input-md">
  <span class="help-block">your new email ID</span>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">new password</label>
  <div class="col-md-4">
    <input id="passwordinput" name="passwordinput" type="password" placeholder="new password" class="form-control input-md">
    <?php
                  if(isset( $_GET['user']))
                  {$_SESSION['userid'] = $_GET['user'];
                                   }
                  ?>
  </div>
</div>

<!-- Password input-->


<!-- Select Basic -->


<!-- Button -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Remove my account</label>
  <div class="col-md-4">
    <button style="float:left" id="singlebutton" name="singlebutton" class="btn btn-danger">remove</button>


      <button style="float:right" id="submit" name="submit" class="btn btn-success center-block">Submit</button>

  </div>
</div>


<!-- Multiple Checkboxes -->

</fieldset>
</form>
            <?php
            session_start();
        echo $_SESSION['userid'];
        $con=mysqli_connect("localhost","root","root123","Codex");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
            if(isset($_POST['submit']))
               {
                $email=$_POST['textinput'];
                $pwd=$_POST['passwordinput'];
                //$result=mysqli_query($con,)
                   $result="UPDATE user
     SET email='".$email."' and password='".$pwd."'
     WHERE id='".$_SESSION['userid']."'";
                   if($con->query($result)==TRUE)
                   {
                       echo '<script language="javascript">';
echo 'alert("record successfully updated")';
echo '</script>';
                   }
                   else
                   {
                       echo '<script language="javascript">';
echo 'alert("updation unsuccessful")';
echo '</script>';
                   }

            }
            if(isset($_POST['singlebutton']))
            {
                $sql="DELETE FROM user WHERE id='".$_SESSION['userid']."'";
                if ($con->query($sql) === TRUE) {
    echo '<script language="javascript">';
echo 'alert("record deleted successfully")';
echo '</script>';
} else {
    echo '<script language="javascript">';
echo 'alert("record didnt get deleted")';
echo '</script>';
}
            }
            ?>

                </div>

            <script src="js/jquery/jquery.min.js"></script>
            <script src="js/bootstrap/bootstrap.min.js"></script>
            <script src="js/angular/angular.min.js"></script>
            <script src="js/bzapp.js"></script>
          </body>

</html>
