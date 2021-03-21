<?php
if(isset($_GET['quepostid']))
 $_SESSION['queid'] = $_GET['quepostid'];
else {
header('Location: '. $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['submit']))
{
if ($_POST['submit'] == 'submit') {
    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $con = mysqli_connect("localhost", "root", "root123", "Codex");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if (isset($_POST['submit'])) {
        $msg = $_POST['myTextArea'];
        $code = $msg;
        $lang = $_POST['language'];
             
        $c = NULL;
        $python = NULL;
        $java = NULL;
        $rating = '3.5';
        if ($lang == 'C') {
            $c = 'yes';
        } else if ($lang == "python") {
            $python =  'yes';
        } else if ($lang == "java") {
            $java =  'yes';
        }
        $sql = "insert into answer (C,Python,Java,solution,Userid,Qid) values ('$c','$python','$java','<pre>$code</pre>','".$_GET['user']."','".$_GET['quepostid']."')";
        // "INSERT INTO Answer (C,Python,Java,solution,Qid) VALUES ('$c','$python','$java',nl2br($code),'" . $_SESSION['queid'] . "')";
        $res = mysqli_query($con, "select * from queavail where Qid=1");
        $rows = mysqli_fetch_array($res);
        if ($con->query($sql) === TRUE) {
            $conn = mysqli_connect("localhost", "root", "root123", "Codex");
            $message = "Successfully submitted code";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    $result = mysqli_query($con, "SELECT * FROM answer");
    while ($row = mysqli_fetch_array($result)) {
        $sol = "<p><pre>" . $row['solution'] . "</pre></p>";
    }
}

}
?>

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
      <li><a href="notification.php?user=<?php echo $_GET['user'] ?>"><span class="glyphicon glyphicon-bell"></span>Notifications</a></li>
    </ul>
  </div>

<br><br>
<form method="post" action="/ProjectCodex/editor.php?user=<?php echo $_SESSION['userid']?>&quepostid=<?php echo $_SESSION['queid']?>" style="width:100%; height:900px">
  <h4 style="margin-left: 12px;">

    <?php

    $con = mysqli_connect("localhost", "root", "root123", "Codex");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $getQuestion = "SELECT * FROM queavail WHERE QID = ".$_GET['quepostid']." limit 1";
    $result = mysqli_query($con, $getQuestion);
    $row = mysqli_fetch_array($result);
    echo $row['Qname'];

    ?>

  </h4>
  <div class="coding-pane">
    <div class="running-pane" style="width:100%;height:5%;background:#acc9e2;padding-top:5px;padding-left:5px;border:solid black 0.5px">
      <button name="submit" value="submit" class="btn btn-primary">Submit</button>
      <button name="submit" value="compile" class="btn btn-primary">Compile & Run</button>
      <select name="language" class="btn btn-primary">
  <option  <?php  if(isset($_POST['language'])) { if ($_POST['language'] == 'C') { echo 'selected'; }} ?>   value="C" >C</option>
  <option <?php  if(isset($_POST['language'])) { if ($_POST['language'] == 'python') { echo 'selected'; }} ?>  value="python">Python</option>
  <option  <?php  if(isset($_POST['language'])) { if ($_POST['language'] == 'python') { echo 'selected'; }} ?>value="java">Java</option>
</select>
    </div>
      <div class="output" style="width:50%;height:100%;padding:10px;float:right;background:#dee5ea;border:solid black 0.5px;" spellcheck="false">
        <?php
if ($_POST['submit'] == 'compile') {
    $lang = "";
    $code = $_POST['myTextArea'];
    $lang = $_POST['language'];
    $filePath = "MainCode";
    //$filePath = "/Applications/XAMPP/xamppfiles/htdocs/ProjectCodex/MainCode";
    if ($lang == 'C') {
        $c = fopen($filePath.".c", "w");
        fwrite($c, $code);
        exec("gcc ".$filePath.".c");
        //print_r(exec("MainCode.exe"));
       // print_r(exec("./a.out"));
        $res = shell_exec("./a.out");
        echo "<pre>$res </pre>";
    } else if ($lang == "python") {
        $pyth = fopen($filePath.".py", "w");
        fwrite($pyth, $code);
       // print_r(exec("python ".$filePath.".py"));
        $res = shell_exec("python ".$filePath.".py");
        echo "<pre>$res </pre>";
    } else if ($lang == "java") {
        $java = fopen($filePath.".java", "w");
        fwrite($java, $code);
        print_r(exec("javac ".$filePath.".java"));
        //system("java ".$filePath);
        //print_r($res);
        $res = shell_exec("java ".$filePath);
        echo "<pre>$res </pre>";
        // print_r($res);
    }
}
?>

      </div>
      <div class="write-code"><textarea style="width:100%;height:100%;padding:10px;border:solid black 0.5px;" spellcheck="false;" placeholder="Write Code Here..." name="myTextArea" id="myTextArea"><?php echo $code ?></textarea></div>
    </div>
  </form>
</body>
</html>
