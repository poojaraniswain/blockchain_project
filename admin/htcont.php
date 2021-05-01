<?php

include('connect.php'); 
$user_to=$_POST['user_to'];

$sql="SELECT * from chat where user_from='$user_to' or user_to='$user_to';";
$res="";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0)
{
	while ($row=mysqli_fetch_assoc($result)) 
	{
        if($row['user_from']=='admin')
        {
		$res=$res.'<div class="anyclass">';
        $res=$res.'<div class="user2">';
		$res=$res."<p>".$row['message'].'</div>';
        $res=$res.'<div class="user2_time">';
		$res=$res.'</p> <span class="time-left">'. $row['stime'].'</span></div>';
        }
        else{
            $res=$res.'<div class="anyclass">';
        $res=$res.'<div class="user1">';
		$res=$res."<p>".$row['message'].'</div>';
        $res=$res.'<div class="user1_time">';
		$res=$res.'<span class="time-right">'. $row['stime'].'</span></div>';

        }
	}
}
echo $res;

  ?>