

<?php
include '../db_connection.php';

echo $pro_id = $_GET['proid'];

$sqlDel = "SELECT * FROM `products` WHERE `pro_id` = {$pro_id}";

$result = mysqli_query($conn,$sqlDel) or die("Query DEL  Failed");

if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){
        $proname = $rows['pro_name'];
    }
    echo "Product Name From Stock : ".$proname ; 

}


$sqlDEl2 = "DELETE FROM `stock` WHERE `product_name` = '{$proname}'" or die("Query DEL FROM STOCk Failed");

if(mysqli_query($conn,$sqlDEl2)){
    
    header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
    echo '<script> alert("product Deleted FROM STOCK Successful") </script>';
}else{
    echo '<script>alert("Can not Delete PRODUCT FROM STOCK")</script>';
}

$sql = "DELETE FROM `products` WHERE `pro_id` = '{$pro_id}'" or die("Query Failed");

if(mysqli_query($conn,$sql)){
    
    header("Location: http://localhost/krushi kendra project/Admin-Dashboard/home.php");
    echo '<script> alert("product Deleted Successful") </script>';
}else{
    echo '<script>alert("Can not Delete Comment")</script>';
}

mysqli_close($conn);
?>

