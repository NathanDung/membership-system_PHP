<?php 
session_start(); 

$manager = 'Admin';
if (($_SESSION['username']) == $manager) {
    $conn = mysqli_connect('localhost', 'root', '', 'goodideasstudio');
    $test = "SELECT * FROM messages";
    $result = mysqli_query($conn, $test);
    echo "目前是管理員狀態"."\n";
    $a = 0;
    while ($a < $result_row = mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    echo "第".$row['id']."筆"."\n";
    echo "Username : ".$row['username']."\n";
    echo "Title : ".$row['title']."\n";
    echo "Message : ".$row['message']."\n";
    echo "Feedback : ".$row['feedback']."\n";
    $a++;
    }
} else {
    echo "無此權限";
}
?>