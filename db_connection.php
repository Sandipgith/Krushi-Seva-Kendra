<?php

$server_name = "Localhost:3306";
$user_name = "root";
$user_password ="";
$db_name = "krushi_kendra (1)";

$conn = mysqli_connect($server_name,$user_name,$user_password,$db_name);

if(!$conn){
    echo'<h1 style="color:red;text-align:center;margin-top:100px;">Connection Failed !!!<h1>';
}

?>