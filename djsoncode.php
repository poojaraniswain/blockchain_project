<?php
  
  include('admin/connect.php');  
/*$user = 'root';
$password = ''; 
$database = 'db_project'; 
$servername ='localhost:3308';
  
$mysqli = new mysqli($servername, 
    $user, $password, $database);
   
if ($mysqli->connect_error) {
    die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
}*/
  
  
  
$sql= "SELECT * FROM order_details";
$result = mysqli_query($conn,$sql);
  
  
while($row = $result->fetch_array()) {
    $paymentdata[] = array(
        "oid" => $row["orderid"],
        "mID" => $row["memberID"],
               "price" => $row["price"],
		 "pID" => $row["productID"],
        "total" => $row["total"],
		
       
    );
}
  
  
  
$file = "paydetails.json";
  
  
if(file_put_contents($file, 
        json_encode($paymentdata)))
    echo("File created");
else
    echo("Failed");
  


  
?>