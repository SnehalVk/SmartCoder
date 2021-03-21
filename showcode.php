<!doctype html>
<html ng-app="CodexApp">

<head>
  <title>Editor</title>

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
    .coding-pane {
      width: 100%;
      height: 100%;
      padding: 10px;
    }

    .write-code {
      width: 50%;
      height: 100%;
      font-family: consolas, monospace;
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
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right">
    <ul class="nav navbar-nav link-effect-4">
      <li><a href="/ProjectCodex/Dashboard.php?user=<?php echo $_GET['user'] ?>">Dashboard</a> </li>
      <!-- <li><a href="/ProjectCodex/about.html" data-hover="About">About </a> </li> -->
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
          <li><a href="/ProjectCodex/profile.php"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
          <li><a href="/ProjectCodex/index.html"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
      </li>
      <li><a href="notification.php"><span class="glyphicon glyphicon-bell"></span>Notifications</a></li>
    </ul>
  </div>

<br><br>
<h4 style="background-color: black; padding: 10px; color: #428BCA">
<?php
$answerId = $_GET['AnsId'];
$con = mysqli_connect("localhost", "root", "root123", "Codex");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$getQuestionID = "SELECT qid FROM answer WHERE AnsID = ".$answerId." limit 1";
$Qresult = mysqli_query($con, $getQuestionID);
$QNameRow = mysqli_fetch_array($Qresult);
echo  'Q.  ';
$questionId = $QNameRow['qid'];


$getQuestion = "SELECT * FROM queavail WHERE QID = ".$QNameRow['qid']." limit 1";
$result_q = mysqli_query($con, $getQuestion);
$row_q = mysqli_fetch_array($result_q);
echo $row_q['Qname'];

?>
</h4>


<?php




session_start();
 $code= isset($_GET['cd']) ? $_GET['cd'] : '';
   $con=mysqli_connect("localhost","root","root123","Codex");
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$ans=$_GET['AnsId'];
 $res=mysqli_query($con,"select * from answer where AnsID='".$ans."'");
 $row=mysqli_fetch_array($res);
echo $row['Solution'];

?>

</body>
</html>
