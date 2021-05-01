<?php
include('connect.php');


$get_id=$_GET['id'];

$result=mysqli_query($conn,"update order_details set status='Delivered', modeofpayment='Paypal' where orderid='$get_id'");

if($result){

    $s_time=date("d")."-".date("m")."-".date("y")." ".date("h")."-".date("i")."-".date("sa");

$cart_table = mysqli_query($conn, "select  * from order_details where orderid='$get_id'") or die(mysqli_error());

    $cart_row = mysqli_fetch_array($cart_table);
    $product_id = $cart_row['productID'];
    $member_id = $cart_row['memberID'];
    $price=$cart_row['price'];
    $product_query = mysqli_query($conn, "select * from tb_products where productID='$product_id'") or die(mysqli_error());
    $product_row = mysqli_fetch_array($product_query);
    $product_name=$product_row['name'];
    $category=$product_row['category'];
    $percentage=$product_row['percentage'];
    $member_query = mysqli_query($conn, "select * from tb_member where memberID = '$member_id'")or die(mysqli_error());
    $member_row=mysqli_fetch_array($member_query);
    $user_name=$member_row['Firstname']." ".$member_row['Lastname'];
    
    $str_val=$get_id."".$member_id."".$product_id."".$price;
    $hash_val=hash('sha256', $str_val);

    $current_data=file_get_contents('paydetails.json');
    $array_data=json_decode($current_data,true);
    $new_data=array(
    'hash'=>$hash_val,
	'user_name'=>$user_name,
    'product_name'=>$product_name,
    'category'=>$category,
    'percentage'=>$percentage,
	'price'=>$price,
	'time'=>$s_time
    );
    $array_data[]=$new_data;
    $json_data=json_encode($array_data);
    file_put_contents('paydetails.json', $json_data);
}


header('location:orders.php');

?>