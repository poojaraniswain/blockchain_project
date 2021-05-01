<?php

$current_data=file_get_contents('hashfile.json');
$array_data=json_decode($current_data,true);
$new_data=array(
	'name'=>'pooja',
	'age'=>'23',
	'city'=>'bbsr');
$array_data[]=$new_data;
$json_data=json_encode($array_data);
if(file_put_contents('hashfile.json', $json_data))
    echo("File created");
else
    echo("Failed");
?>