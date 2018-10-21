<?php
session_start();
unset ($_COOKIE["OwnCookie"]);
setcookie("OwnCookie", null);
$pig = mysqli_connect('localhost', 'root', '', 'goodideasstudio');
//    if (! $conn) {
//        die ('Could not connect : '. mysqli_connect_error());
//    }
//    echo 'Connected successfully'."<br>";
$name = mysqli_real_escape_string($pig, trim($_SESSION['username']));
$title = mysqli_real_escape_string($pig, trim($_POST['title']));
$message = mysqli_real_escape_string($pig, trim($_POST['message']));
$title_check = strlen($title);
$message_check = strlen($message);
if (! empty ($message) && ($title)) {
    if ($title_check < 21) {
        if ($message_check < 151) {
            $sql = "INSERT INTO messages (username, title, message) VALUES ('$name', '$title', '$message')";
            if (mysqli_query($pig, $sql) == 1) {
                echo "新增留言成功";
                } else {
                echo "錯誤 : " . $sql . "<br>" . mysqli_error($pig);
            }
        } else {
            echo "訊息內容超過限制字數，請重新輸入";
        }
    } else {
        echo "標題超過限制字數，請重新輸入";
    }
} else {
    echo "欄位不可為空，請重新輸入";
}
$pig->close();
exit();
?>       