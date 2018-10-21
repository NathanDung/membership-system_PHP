<?php
session_start();
unset ($_COOKIE["OwnCookie"]);
unset ($_COOKIE["TestCookie"]);
unset ($_SESSION["username"]);
setcookie("OwnCookie", null);
setcookie("TestCookie", null);
$_SESSION["username"] = null;

$conn = mysqli_connect("localhost", "root", "", "goodideasstudio");

$email = preg_replace("/[^A-Za-z0-9@. ]/", "", $_POST['email']);
$password = preg_replace("/[^A-Za-z0-9@. ]/", "", $_POST['password_1']);
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$password = mysqli_real_escape_string($conn, trim($_POST['password_1']));
$password = md5($password);
//$account = $_POST['email'];
//$password = $_POST['password_1'];

$check = "SELECT * FROM members WHERE email = '$email' AND password_1 = '$password'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    
        echo "登入成功"."\n";
    
    
    //$_SESSION['login'] = "登入成功";
    $return = "SELECT username FROM members WHERE email = '$email'";
    $result_return = mysqli_query($conn, $return);
    $row= mysqli_fetch_assoc($result_return);
    $username = $row['username'];
    // $test = HASH('md5','$username');
    $_SESSION['username'] = "$username";
    echo $_SESSION['username'];
    $a = $_SESSION['username'];
    $b = HASH('md5', $a);
    setcookie("OwnCookie", $b, time() +3600);
    // header ("Refresh:0; url=./index.php");
} else {
    
        echo "登入失敗，請重新登入";
    // header ("Refresh:0; url=./system.php");
}
$conn->close();
exit();
?>