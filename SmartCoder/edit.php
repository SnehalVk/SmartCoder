<?php
if (isset($_GET['user'])) {
    $_SESSION['userid'] = $_GET['user'];

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

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

    function ChangeFile(select) {
     //alert(select.options[select.selectedIndex].text);
     var fileType = select.options[select.selectedIndex].text;
     if(fileType=='C'){
       alert("A C main program must return int");
       $.ajax({
           url : "/ProjectCodex/CProgram.c",
           dataType: "text",
           success : function (data) {
               $("#myTextArea").text(data);
           }
       });
     }
     else if(fileType=='Java'){
       alert("The public class name should be named 'MainClass'");
       $.ajax({
           url : "/ProjectCodex/JavaProgram.java",
           dataType: "text",
           success : function (data) {
               $("#myTextArea").text(data);
           }
       });
     }

     }
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
      <li><a href="/ProjectCodex/Dashboard.php?user=<?php echo $_SESSION['userid']?>">Dashboard</a> </li>
      <!-- <li><a href="/ProjectCodex/about.html" data-hover="About">About </a> </li> -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#428BCA;font-size:15px;">
          <?php
          if (isset($_GET['user'])) {
              $_SESSION['userid'] = $_GET['user'];
              echo "<b><input name='userid' class='username' type='text' value = '".$_SESSION['userid']."' disabled='true'/> </b>";
          }
          ?>

          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/ProjectCodex/profile.php?user=<?php echo $_SESSION['userid']?>"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
          <li><a href="/ProjectCodex/index.html"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
      </li>
      <li><a href="/ProjectCodex/notification.php?user=<?php echo $_SESSION['userid']?>"><span class="glyphicon glyphicon-bell"></span>Notifications</a></li>
    </ul>
  </div>

<br><br>
  <form method="post" action="/ProjectCodex/editor.php?quepostid=<?php echo $_GET['quepostid']?>&user=<?php echo $_SESSION['userid']?>" style="width:100%; height:900px">
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
        <select  name="language" class="btn btn-primary" onchange="ChangeFile(this)">
            <option value="python">Python</option>
            <option value="java">Java</option>
            <option value="C">C</option>
        </select>
      </div>
      <div class="output" style="width:50%;height:100%;padding:10px;float:right;background:#dee5ea;border:solid black 0.5px;" spellcheck="false"></div>
      <div class="write-code"><textarea style="width:100%;height:100%;padding:10px;border:solid black 0.5px;" spellcheck="false;" placeholder="Write Code Here..." name="myTextArea" id="myTextArea"></textarea></div>
    </div>
  </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/angular/angular.min.js"></script>
<script src="js/bzapp.js"></script>
</body>
</html>
