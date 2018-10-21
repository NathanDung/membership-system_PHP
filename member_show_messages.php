<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "goodideasstudio");

$result_session = $_SESSION['username'];

$select = "SELECT * FROM messages WHERE username = '$result_session' ORDER BY create_time DESC";
$result = mysqli_query($conn, $select);
$i = 0;
$row = mysqli_num_rows($result);
if ($row != null) {
    while ($i < $row) {
        $row_1 = mysqli_fetch_assoc($result);
        echo "第".$i."筆"."\n";
        echo "Name : ".$row_1['username']."\n";
        echo "Title : ".$row_1['title']."\n";
        echo "Message : ".$row_1['message']."\n";
        echo "Feedback : ".$row_1['feedback']."\n";
        $i++;
        }
    } else {
        echo "查無留言";
}
?>