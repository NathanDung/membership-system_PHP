<?php
session_start(); 
$manager = 'Admin';
if (($_SESSION['username']) == $manager) {
	$conn = mysqli_connect('localhost', 'root', '', 'goodideasstudio');
	$postId = $_POST['id'];
	$test = "SELECT * FROM messages WHERE id = $postId";
	$result = mysqli_query($conn, $test);
	//var_dump($result);
	$row = mysqli_fetch_assoc($result);
	echo "id : ".$row['id']."\n";
	echo "username : ".$row['username']."\n";
	echo "title : ".$row['title']."\n";
	echo "message : ".$row['message']."\n";
	$feedback = $_POST['feedback'];
	$feedback_check = strlen($feedback);
	$feedback_new = mysqli_real_escape_string($conn, trim($feedback));
		if (! empty($feedback)) {
			if ($postId = $row['id']) {
				if ($feedback_check < 151) {
					$new = "UPDATE messages SET feedback = '$feedback_new' WHERE id = $postId";
					$result_new = mysqli_query($conn, $new);
					$answer = "SELECT * FROM messages WHERE feedback = '$feedback_new'";
					$result_answer = mysqli_query($conn, $answer);
					$a = 0;
						while ($a < $b = mysqli_num_rows($result_answer)) {
						$row_1 = mysqli_fetch_assoc($result_answer);
						$a++;
							}
					echo "Feedback : ".$row_1['feedback']."\n";
					echo "回覆成功";
				} else {
					echo "回覆超過限制字數，請重新輸入";
				}
			} else {
				echo "查無此留言，請重新輸入ID";
			}
		}else {
			echo "欄位不可為空，請重新輸入";
		}
	}
else {
	echo "無此權限";
}
?>