<!doctype html>
<html ng-app="CodexApp">
<head>
    <title>Post a question</title>

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
.coding-pane{
  width: 100%;
  height: 100%;
  padding: 10px;
}
.write-code{
  width:100%;
  height: 30%;
  font-family: consolas,monospace;
}
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
    <div class="">
        <div class="header-top">
            <div class="container">
                <div class="header-top-right">
                <p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:ssditeam@gmail.com">ssditeam@gmail.com</a></p>
          <p><i class="fa fa-phone" aria-hidden="true"></i> (704) 191 9191</p>
                </div>
            </div>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav link-effect-4">
              <li><a href="Dashboard.php?user=<?php echo $_GET['user']?> " data-hover="Dashboard">Dashboard</a> </li>
              <!-- <li><a href="about.html" data-hover="About">About </a> </li> -->
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
                      <li><a href="profile.php"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                      <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                  </ul>
              </li>
              <!-- <li><a href="notification.php?userid=<?php echo $_GET['user'] ?>"><span class="glyphicon glyphicon-bell"></span>Notifications</a></li> -->
              <!-- <form class="navbar-form  navbar-right"> -->

              <!-- </form> -->

          </ul>
      </div>
      <h4 style="color:#428BCA;font-weight:bold"> &nbsp; Post a question</h4> <br>
<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?user=".$_SESSION['userid'];?>"  style="width:100%; height:100%">
<div class="coding-pane">
<div class="running-pane" style="width:100%;height:7%;background:#acc9e2;padding-top:5px;padding-left:5px;border:solid black 0.5px">
  <button name="submit" value="submit" class="btn btn-primary">Submit</button>
</div>
<div class="write-code"><textarea style="width:100%;height:100%;padding:10px;" spellcheck="false;" placeholder="Post your question here..." name="text" id="text"></textarea></div>
</div>
<?php
if(isset( $_POST['userid']))
{$_SESSION['userid'] = $_POST['userid'];
echo "Hi ";
echo "<b><input name='userid' class='username' type='text' value = '".$_SESSION['userid']."' disabled='true'/> </b>";
}


//echo $_SESSION['userid'];
 $con=mysqli_connect("localhost","root","root123","Codex");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit']))
{
    $text=$_POST['text'];

     $sql = "INSERT INTO queavail (Qname,userid) VALUES ('".$text."','".$_SESSION['userid']."')";
    if ($con->query($sql) === TRUE) {
     //$conn=mysqli_connect("localhost","root","","Codex");

	$message = "Successfully posted the question";
    //include 'sample.php';
echo "<script type='text/javascript'>alert('$message');</script>";

} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/angular/angular.min.js"></script>
<script src="js/bzapp.js"></script>
</body>
</html>
