<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "goodideasstudio");

$result_session = $_SESSION['username'];

$select = "SELECT * FROM messages WHERE username = '$result_session' ORDER BY create_time DESC";
$result = mysqli_query($conn, $select);
$i = 0;
    while ($i < $row = mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        echo "第".$i."筆"."\n";
        echo "Name : ".$row['username']."\n";
        echo "Title : ".$row['title']."\n";
        echo "Message : ".$row['message']."\n";
        echo "Feedback : ".$row['feedback']."\n";
        $i++;
}
?>