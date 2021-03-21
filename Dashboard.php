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

  <!-- scrolling script -->
  <script src="js/jquery-2.1.4.min.js"></script> 
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
  <!-- LiVE Search from database -->
  <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
            $('.qbox').show();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
        
        $('.qbox').hide();
        var n = $(this).text();
        $('div[value="'+$(this).text()+'"]').each(function() {
        $(this).show();
        
        });
        });
});
</script>
  <!-- // LiVE Search from database -->



<style>
input.username{
  border: 0px;
  background: white;
  width: 100px;
}


</style>
</head>
<body>
<?php
if(!isset( $_GET['user']))
{
header('Location: index.html');
}
  ?>
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
              <li class="active"><a href="Dashboard.php?user=<?php echo $_GET['user']?>" data-hover="Dashboard">Dashboard</a> </li>
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
              <div class="search-box fa fa-search">
                 
                <input type="text" autocomplete="off" placeholder="Search Questions ..." />
                <div class="result"></div>
              </div>
              <div class="page-header">
                <h1 style="">My snippets <a href="posting.php?user=<?php echo $_SESSION['userid'] ?>">
                  <button type="button" class="btn btn-primary btn-lg " style="float: right; margin-left: 10px;">
                     <span class="glyphicon glyphicon-plus"></span>
                     Post New
                  </button></a>
                <a href="question.php?user=<?php echo $_SESSION['userid']?>">
                  <button type="button" class="btn btn-primary btn-lg pull-right">
                    <span class="glyphicon glyphicon-plus"></span>
                      Answer New
                    </button></a>
                </h1>
              </div>
<?php
$con = mysqli_connect("localhost", "root", "root123", "Codex");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$r = mysqli_query($con, "SELECT * FROM answer where Userid = '".$_SESSION['userid']."'");
echo '<div class="container outerpadding"> <div class="row">';
while ($rows = mysqli_fetch_array($r)) {
    $res = mysqli_query($con, "select * from queavail where Qid='" . $rows['Qid'] . "'");
    $row = mysqli_fetch_array($res);
    $que = "hi";
    $_SESSION['que'] = str_replace('"', "", $row['Qname']);
    $que = $_SESSION['que'];
    $_SESSION['editcode'] = $rows['Solution'];
    $code = substr($rows['Solution'], 0, 150);
    
    global $que;
    $n = 1;
    if ($rows['C'] == "yes") {
        $lang = "C";
    } else if ($rows['Python'] == "yes") {
        $lang = "Python";
    } else {
        $lang = "Java";
    }
    if ($rows['Rating'] == 5) {
        $count = 5;
    } else if ($rows['Rating'] == 4) {
        $count = 4;
    } else if ($rows['Rating'] == 3) {
        $count = 3;
    } else if ($rows['Rating'] == 2) {
        $count = 2;
    } else {
        $count = 1;
    }
    echo ' <div class="col-lg-3 qbox" id="box" value="'. $que .'">
     
     <div class="panel" style="display:inline" >

        <div  class="panel-heading" style="background-color:#428BCA;color:#fff;"><strong>' . $que . '</strong></div>
        <div  class="panel-body" style="background-color:#000;color:#fff; box-shadow:0 -12px 13px #428BCA inset;">

        <div class="boximg" >
           <div class="featureinfo" style="height:30px"><p>' . $code . '</p>
        
          </div>
         <span class="likebut glyphicon glyphicon-tag"></span>
         </div>
   <br>
        <p class="pull-left">Language
        </p>
     <span class="badge pull-right" style="background-color:teal">' . $lang . '</span>
     
     <br>';
    echo "\t";
     while ($n <= $count) {

        echo '<p style="display:inline"> <span class="glyphicon glyphicon-star" style="font-size:18px;white-space:nowrap;"></span></p>';
        $n++;
    } 
    echo "\t\t\t\t\t";
    echo '<a class="btn btn-primary btn-sm pull-right" href="showcode.php?user='.$_SESSION['userid'].'&AnsId=' . $rows['AnsID'] . '" role="button">more</a> ';
    echo '</div>
     </div>
  </div>
  ';
}
echo '</div>

</div>';
?>
            </div>
            <nav aria-label="pagination">
              <ul class="pager">

                <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
              </ul>
            </nav>
            <script src="js/jquery/jquery.min.js"></script>
            <script src="js/bootstrap/bootstrap.min.js"></script>
            <script src="js/angular/angular.min.js"></script>
            <script src="js/bzapp.js"></script>
          </body>

</html>
