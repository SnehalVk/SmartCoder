<?php
error_reporting(E_ERROR | E_PARSE);
// if (isset($_POST['submit'])) {
    $rno = $_POST["userid"];
    $password = $_POST["pw"];
// }
$con = mysqli_connect("localhost", "root", "root123", "Codex");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
print_r($_POST);
$login_query = 'select * from users where Userid="' . $rno . '"and password="'.$password.'"';
echo $login_query;
$result = mysqli_query($con, 'select * from users where Userid="' . $rno . '"and password="'.$password.'"');
$rows = mysqli_fetch_array($result);

if ($rows) {
    $_SESSION['userid'] = $_POST["userid"];
    header("Location: Dashboard.php?user=".$_POST["userid"] );
    session_start();

}

if (!$rows) {
    //ob_start();
    $message = "Wrong username or password";
    echo "<script type='text/javascript'>alert(" . $message . ");</script>";
    echo "<a href='register.php'>Go to login page to enter correct credentials</a>";
    header('Location: register.php?message=Invalid');
    //ob_end_flush();

}

?>
