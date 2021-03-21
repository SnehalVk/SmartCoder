<!--
	Author: Group 4
	Developed by students of University of North Carolina, Charlotte
	College Website: www.uncc.edu
-->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <title>Register or Login to Smart Coder a Coding Ground for Students | Register :: Group 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Smart Coder a Responsive website, Bootstrap websites, Flat websites, Android Compatible website,
Smartphone Compatible website, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

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
  <script> 
  $(function(){
    $("#contact").load("contact.html"); 
  });
  </script>
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
</head>
<style>
    .LoginHead {
        width: 50%;
        background: #05183a;
        height: 50px;
        color: white;
        padding-top: 8px;
        font-family: font-awesome;
        padding-left: 3%;
    }

    .myRegisterForm {
        width: 50%;
        height: 500px;
        background: #cdd1d8;
        padding-top: 3%;
        padding-left: 3%;
        padding-right: 10%;
    }

    .RegisterForm {
        float: right;
        width: 50%;
        height: 100%;
    }
    input.username{
  border: 0px;
  background: white;
  width: 100px;
}

</style>
<!-- Body -->

<body>

  <?php
  if(isset($_GET['message']))
  {
  echo '<script type="text/javascript">alert("Invalid user or password, check again."); </script>';
  }
  ?>

    <?php
 session_start();
 $queid= isset($_GET['queid']) ? $_GET['queid'] : '';
$quepostid= isset($_GET['quepostid']) ? $_GET['quepostid'] : '';
 //echo $queid;
 //echo $quepostid;
 $_SESSION['queid']=$queid;
 $_SESSION['quepostid']=$quepostid;
 ?>

        <!-- banner -->
        <div class="banner1">
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
                            <div class="navbar-brand logo ">
                                <h1 class="animated wow pulse" data-wow-delay=".5s">
									<a href="index.html">Smart Coder</a></h1>
                            </div>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav link-effect-4">
                                <li><a href="index.html" data-hover="Home">Home</a> </li>
                                <li><a href="about.html" data-hover="About">About </a> </li>
                                <li class="active"><a href="register.php" data-hover="Register">Get Started </a> </li>
                                <li><a href="#contact" data-hover="Contact">Contact</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <h2>Get Started</h2>
        </div>
        <!-- //banner -->
        <!-- Register Forms -->
        <div class="RegisterForm" style="border-left: solid black 1px;">
            <div class="LoginHead" style="width:100%;">
                <h2> Register </h2> </div>
            <div class="myRegisterForm" style="width:100%; ">
                <form method="post" action="reg.php">
                    <div class="form-group">
                        <label for="usr">Student ID:</label>
                        <input type="text" class="form-control" id="usernamesignup" name="rollno" required="required">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" name="name" required="required" >
                    </div>
                    <div class="form-group">
                        <label for="usr">Email:</label>
                        <input type="text" class="form-control" id="emailsignup" name="email" required="required" type="email" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="passwordsignup" name="pw"required="required">
                    </div>
                    <br>
                    <div class="form-group">
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
												<input type="submit"  class="btn btn-primary" value="Sign up" name="submit" />
                    </div>

                </form>
            </div>
        </div>

        <div class="LoginHead">
            <h2> Login </h2> </div>
        <div class="myRegisterForm">
            <form  action="login.php" autocomplete="on" method="post">
                <div class="form-group">
                    <label for="usr">Student ID:</label>
                    <input type="text" class="form-control" id="userid" name="userid">
                </div>
                <br>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pw" name="pw" >
                </div>
                <br>
                <div class="form-group">
                    <!-- <button type="submit" class="btn btn-primary" type="submit" value="Login" name="login">Submit</button> -->
										<input  class="btn btn-primary"  type="submit" value="Login" name="login" />
								</div>

            </form>
        </div>
        <div class="contact" id="contact">

        </div>
        <!-- Register Form End -->
        <!-- copyright -->
        <div class="copyright">
            <div class="container">
                <div class="copyrightbottom">
                    <p>© 2019 Codex. All Rights Reserved | Design By <a href="localhost">Group 4</a></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //copyright -->

        <!-- Default-JavaScript-File -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <!-- //Default-JavaScript-File -->

        <!-- Jarallax -->
        <script src="js/jarallax.js"></script>
        <script type="text/javascript">
            /* init Jarallax */
            $('.jarallax').jarallax({
                speed: 0.5,
                imgWidth: 1366,
                imgHeight: 768
            })
        </script>
        <!-- //Jarallax -->

        <!-- smooth scrolling -->
        <script src="js/SmoothScroll.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                	var defaults = {
                	containerID: 'toTop', // fading element id
                	containerHoverID: 'toTopHover', // fading element hover id
                	scrollSpeed: 1200,
                	easingType: 'linear'
                	};
                */

                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <!-- //here ends scrolling icon -->
        <!-- //smooth scrolling -->

</body>
<!-- //Body -->

</html>
