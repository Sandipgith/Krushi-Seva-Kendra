<?php 

include '../db_connection.php';
if(isset($_POST['product_add'])){
if(isset($_FILES['product_image'])){
    $errors = array();

    $file_name = $_FILES['product_image']['name'];
    $file_size = $_FILES['product_image']['size'];
    $file_tmp = $_FILES['product_image']['tmp_name'];
    $file_type = $_FILES['product_image']['type'];
    // $file_ext = end(explode('.',$file_name));

    // $extentions = array("jpeg","jpg","png");

    // if(in_array($file_ext,$extentions) === false){
    //     $errors[] = "This Extention file is not allowed";
    // }

    if(empty($errors) == true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($errors);
        die();
    }
}





    $product_name = mysqli_real_escape_string($conn,$_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn,$_POST['product_price']);
    $product_category = mysqli_real_escape_string($conn,$_POST['product_category']);
    //$product_image = mysqli_real_escape_string($_POST['product_image']);
    $product_detail = mysqli_real_escape_string($conn,$_POST['product_detail']);
    $product_quentity = $_POST['product_quentity'];

    // $sql = "INSERT INTO products(`pro_name`,`pro_price`,`pro_image`,`pro_detial`,`pro_category`) 
    // VALUES('{$product_name}','{$product_price}','{$file_name}','{$product_detail}','{$product_category}')";

    $sql = "INSERT INTO `products`(`pro_name`, `pro_price`, `pro_image`, `pro_detail`, `pro_category`) VALUES ('{$product_name}','{$product_price}','{$file_name}','{$product_detail}','{$product_category}')";

    if(mysqli_query($conn,$sql)){
        header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
    }else{
        echo"<div style='color:red;text-align:center;margin:20px 0px;'>Querry Failed!!!!!!</div>";
    }

    $sql2 = "INSERT INTO `stock`(`product_name`, `quentity`,`product_cat`,`total_stock`) VALUES ('{$product_name}',{$product_quentity},'{$product_category}',{$product_quentity})";

    if(mysqli_query($conn,$sql2)){
        header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
    }else{
        echo"<div style='color:red;text-align:center;margin:20px 0px;'>Querry Failed!!!!!!</div>";
    }

}

?>

