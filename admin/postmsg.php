<?php

 include('connect.php'); 
$msg= $_POST['text'];
$user_from= $_POST['user_from'];
$user_to= $_POST['user_to'];

$sql="INSERT INTO `chat` (`message` ,`user_from` ,`user_to`)VALUES ( '$msg', '$user_from', '$user_to');";

mysqli_query($conn, $sql);
mysqli_close($conn);
?>