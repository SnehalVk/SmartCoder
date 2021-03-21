<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['submit'])) {
    $rno = $_POST["rollno"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pw"];
}

$con = mysqli_connect("localhost", "root", "root123","Codex");
if ($con->connect_error) {
    echo "D b connection error";
    die("Connection failed: " . $con->connect_error);
}
$result = mysqli_query($con, 'select * from users where email="' . $email . '"');
$rows = mysqli_fetch_array($result);
if ($rows) {
    $msg = "account already exists";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    include ('index.html');
} else {
    $sql = "INSERT INTO users (Userid,Name,email,password) VALUES ('$rno','$name', '$email', '$password')";
    if ($con->query($sql) === TRUE) {
        $message = "successfully registered enter login details";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    include ("index.html");
}
?>
