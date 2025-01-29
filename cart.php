<?php
include 'db_connection.php';
if(isset($_POST['add_to_cart'])){
   $proQuentity = $_POST['product_quantity'];
   $proName = $_POST['product_name'];
   

   $qntsql = "SELECT * FROM `stock` WHERE `product_name` = '{$proName}'";

   $runsql = mysqli_query($conn,$qntsql) or die("query error");

   if(mysqli_num_rows($runsql) > 0){
      while($qntrows = mysqli_fetch_assoc($runsql)){
         $stockQtn = $qntrows['quentity'];
      }
   }
//    echo $proName."=>".$proQuentity;
// echo "database Quentity = ".$stockQtn;

   $minusstock = $stockQtn - $proQuentity;
//    echo $minusstock;


   $updateStock = "UPDATE `stock` SET `quentity`={$minusstock} WHERE `product_name` = '{$proName}'";
   $runsql2 = mysqli_query($conn,$updateStock) or die("update stock query error");

   if($runsql2){
      echo'<script>alert("Stock Updated")</script>';
   }else{
      echo'<script>alert("Stock cant Updated")</script>';
   }

}

// /////////////////////////// Update Stock from Cart page //////////////////////
if(isset($_POST['update_cart'])){
    $PRONAME = $_POST['cart_proname'];
    $PROQUENTITY = $_POST['cart_quantity'];


   $CARTSQL = "SELECT * FROM `cart` WHERE `name` = '{$PRONAME}'";

   $CARTRESULT = mysqli_query($conn,$CARTSQL) or die("Update from cart query fialed !!!!");

   if(mysqli_num_rows($CARTRESULT) >0){
      while($ROWS = mysqli_fetch_assoc($CARTRESULT)){
         $FROMCART = $ROWS['quantity'];
      }
   }

      $updateSTOCK = $PROQUENTITY - $FROMCART;
   $qntsql6 = "SELECT * FROM `stock` WHERE `product_name` = '{$PRONAME}'";

   $runsql6 = mysqli_query($conn,$qntsql6) or die("query error6");

   if(mysqli_num_rows($runsql6) > 0){
      while($qntrows6 = mysqli_fetch_assoc($runsql6)){
         $stockQtn6 = $qntrows6['quentity'];
      }
   }
   // Update Stock Table
      $minusCart = $stockQtn6 - $updateSTOCK;

      ///////////////////////////////////
   $updateStock = "UPDATE `stock` SET `quentity`={$minusCart} WHERE `product_name` = '{$PRONAME}'";
   $runsql2 = mysqli_query($conn,$updateStock) or die("update stock query error6");

   if($runsql2){
      echo'<script> alert("Stock Updated from cart") </script>';
   }else{
      echo'<script> alert("Stock cant Updated from cart") </script>';
   }
}
?>

 <?php 
include 'db_connection.php';
session_start();
$user_id = $_SESSION['user-id'];
// echo $user_id;

// die();

if(!isset($user_id)){
    header('location: login.php');
 };

 if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($select_cart) > 0){
    //    $message[] = 'product already added to cart!';
    echo'<script>alert("product already added to cart!")</script>';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `name`, `price`, `image`, `quantity`) VALUES('{$user_id}', '{$product_name}', '{$product_price}', '{$product_image}', '{$product_quantity}')") or die('query failed');


    echo'<script>alert("product added to cart!")</script>';
    }
 
 };

/// Change **********************************************
 if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    

    mysqli_query($conn, "UPDATE `cart` SET `quantity` = '{$update_quantity}' WHERE `id` = '{$update_id}'") or die('query failed');

    // $message[] = 'cart quantity updated successfully!';
   //  echo'<script>alert("cart quantity updated successfully!")</script>';

// //////////////////////////////////////////////////////////////////////////////////////////////
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


 }
//  /* chnage ********************************************


 if(isset($_GET['remove'])){
    echo $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE `id` = '$remove_id'") or die('query failed');
    header('location: cart.php');
 }
   
 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE `user_id` = '$user_id'") or die('query failed');
    header('location:index.php');
 }
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="images/icon2.png">
        <title>Shopping-cart</title>
    </head>
<body>
<div class="shopping-cart">
<div class="shopping-cart-title">
<h1>Shopping Cart</h1>
</div>
<table class="cart-table">
   <thead>
      <th>image</th>
      <th>name</th>
      <th>price</th>
      <th>quantity</th>
      <th>total price</th>
      <th>action</th>
   </thead>
   <tbody class="table-body">
   <?php
      $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE `user_id` = '$user_id'") or die('query failed');
      $grand_total = 0;
      if(mysqli_num_rows($cart_query) > 0){
         while($fetch_cart = mysqli_fetch_assoc($cart_query)){
   ?>
      <tr>
         <td><img src="Admin-Dashboard/upload/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
         <td><?php echo $fetch_cart['name']; ?></td>
         <td><?php echo $fetch_cart['price']; ?>/-</td>

         <!-- //////////////////////////////////////////////////////////// -->
         <td>
            <form action="" method="post">
               <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
               <input type="hidden" name="cart_proname" value="<?php echo $fetch_cart['name']; ?>">
                  <!-- ////////////////////////////////////////////////////// -->


                  <?php 
                           $CARTPRODUCTNAME = $fetch_cart['name'];
                        $stocksql = "SELECT * FROM `stock` WHERE `product_name` = '{$CARTPRODUCTNAME}'";

                        $stockresult = mysqli_query($conn,$stocksql) or die("stock queryfailed");

                        if(mysqli_num_rows($stockresult) > 0){
                           while($rowsstock = mysqli_fetch_assoc($stockresult)){
                              $stock_Quentity = $rowsstock['quentity'];
                              $total_stock = $rowsstock['total_stock'];
                           }
                        }
                        // echo "STOCK >>> ".$stock_Quentity;
                        // echo "TOTAL_STOCK >>> ".$total_stock;
                  ?>


                  <!-- ////////////////////////////////////////////////////////// -->
               <input type="number" min="1" max="<?php echo $total_stock; ?>" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" style="width: 100px;padding: 5px;margin-top:7px;border-radius:6px;">

               <input type="submit" name="update_cart" value="Update" class="option-btn" style="background:blue;padding: 9px 20px;text-decoration: none;color: white;border-radius: 5px; font-size:18px;outline:none;border:none;margin-left:10px;">
            </form>
         </td>
         <!-- //////////////////////////////////////////////////////////////////// -->
         <td > <?php $sub_total = 0;echo $sub_total += ((int)$fetch_cart['price'] * (int)$fetch_cart['quantity']); ?>/-</td>

         <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');" style="background: red;padding: 9px 16px;text-decoration: none;color: white;border-radius: 5px;">Remove</a></td>
      </tr>

   <?php
      $grand_total += $sub_total;
        }
      }else{ ?>
      <tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no Products added <a href="index.php">add Products</a> </td></tr>
    <?php  }
   ?>
   <tr class="table-bottom">
      <td colspan="4" style="background: blue;color: white;font-size: 28px;border-radius: 5px;">Grand Total : </td>
      <td style="background:green;color: white;border-radius: 8px"><?php echo $grand_total; ?>/-</td>
      <td ><a href="cart.php?delete_all"  class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>"  style="background: red;padding: 9px 16px;text-decoration: none;color: white;border-radius: 5px;">Delete all</a></td>
   </tr>
</tbody>
</table>

</div>
</div>

<div class="cart-hr">
    <hr>
</div>
<!-- order form -->
<div class="cart-checkout">
    
    <a href="checkout.php">Check Out</a>
</div>



</body>
</html>
