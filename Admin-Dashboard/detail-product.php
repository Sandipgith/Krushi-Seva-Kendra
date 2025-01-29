<?php include 'admin-dashboard.php'; ?>
<title>Details Of Product</title>
    <div class="dash-page-title">
        <h1>More Details Page</h1>
    </div>

    <?php

if(isset($_GET['proname'])){
    $product_name = $_GET['proname'];
    echo $product_name;

                echo "
                <div class='order-message-container'>
                    <div class='bill-main-div'>
                    <div class='message-container'>
                        <div class='message-container'>
                            <div>
                                <h1>Add More Stock</h1>
                                $product_name
                            <div>
                            <div>
                            
                            <form action='detail-product.php' method='get'>
                    

                    <div class='fer-label-1'>
                        <label for=''>Product Name : </label>
                        <input type='text' value='$product_name' placeholder='Product Name' name='product_name' required >
                    </div>

                    <div class='fer-label-1'>
                        <label for=''>Add Stock : </label>
                        <input type='text' placeholder='Add Stock' name='product_stock' required autofocus>
                    </div>

                    <div class='fer-label-1'>
                        <input type='submit' value='Add' name='add_stock' id='add-product'>
                    </div>

                </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
                </div>";


}

?>



    <?php 
    include '../db_connection.php';

if(isset($_GET['add_stock'])){
    $productNAME = $_GET['product_name'];
    $productSTOCK = $_GET['product_stock'];

     $productNAME;
     $productSTOCK;

    $oldsql = "SELECT * FROM `stock` WHERE `product_name` = '{$productNAME}'";

    $oldresult = mysqli_query($conn,$oldsql) or die("Old Stock Query Failed");

    if(mysqli_num_rows($oldresult) > 0){
        while($oldRows = mysqli_fetch_assoc($oldresult)){
            $oldSTOCK = $oldRows['quentity'];
            $oldTotal_STOCK = $oldRows['total_stock'];
        }
    }

    // echo"Old Quentity of >>>>>>".$oldSTOCK;
    // echo"Old total_stock >>>>>>".$oldTotal_STOCK;

    $newSTOCK = $oldSTOCK + $productSTOCK;
    $newTotalSTOCK = $oldTotal_STOCK + $productSTOCK;

    // echo " /// ------->". $newSTOCK;
    // echo "--------->".$newTotalSTOCK;

    $updateSQL = "UPDATE `stock` SET `quentity`=$newSTOCK,`total_stock`=$newTotalSTOCK WHERE `product_name` = '{$productNAME}'";

    if(mysqli_query($conn,$updateSQL)){
        echo '<script>alert("New Stock Updated")</script>';
        header("Location: http://localhost/krushi kendra project/Admin-Dashboard/detail-product.php?prodname=".$productNAME);
    }

}

    // ///////////////////////////////////////////////////////////////////////////////////////
    if(isset($_GET['id'])){
     $product_id = $_GET['id'];
    //  $product_names = $_GET['prodname'];

    $sql = "SELECT * FROM `products` WHERE `pro_id` = {$product_id}" or die("Query Failed!");

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        while($rows = mysqli_fetch_assoc($result)){
            $product_name = $rows['pro_name'];
        
    ?>



    <div class="details-main-div">
    <div class="details-sub-div">
        <div class="details-pro-div">
                <div class="detail-pro-img">
                    <img src="upload/<?php echo $rows['pro_image']; ?>" alt="img">
                    <div id="edit-delete"><a href="edit-product.php?proid=<?php echo $product_id; ?>">Edit</a> 
                    <a href="delete-product.php?proid=<?php echo $product_id; ?>">Delete</a></div>
                </div>
                <div class="detail-pro-details">

                    <div class="details-h3">
                        <h3>Name : <span><?php echo $rows['pro_name']; ?></span></h3>
                    </div> <hr>

                    <div class="details-h3">
                        <h3>Price : <span>RS. <?php echo $rows['pro_price']; ?> INR</span></h3>
                    </div> <hr>
                        <?php 

                            $stocksql = "SELECT * FROM `stock` WHERE `product_name` = '{$product_name}'";

                            $stockResult = mysqli_query($conn,$stocksql) or die("Stock Query Failed");

                            if(mysqli_num_rows($stockResult) >0){
                                while($stockrows = mysqli_fetch_assoc($stockResult)){
                                    $stockQuentity = $stockrows['quentity'];
                                }
                            }


                        ?>
                    <div class="details-h3">
                        <h3>Stock Remain: <span><?php echo $stockQuentity; ?><a href="detail-product.php?proname=<?php echo $product_name; ?>"> Add Stock</a></span></h3>
                    </div> <hr>

                    <div class="details-h3">
                        <h3>Details : </h3>
                    </div>
                    
                    <div class="detail-h3">
                        
                        <h3><span><?php echo $rows['pro_detail']; ?>
                        </span></h3>

                    </div>
                </div>
        </div>
    </div>

    </div>
    <?php } } 

    }elseif(isset($_GET['prodname'])){
        
         $product_names = $_GET['prodname'];

         
    $sql = "SELECT * FROM `products` WHERE `pro_name` = '{$product_names}'" or die(" product name Query Failed!");

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        while($rows = mysqli_fetch_assoc($result)){
            $product_name = $rows['pro_name'];
        
    ?>



    <div class="details-main-div">
    <div class="details-sub-div">
        <div class="details-pro-div">
                <div class="detail-pro-img">
                    <img src="upload/<?php echo $rows['pro_image']; ?>" alt="img">
                    <div id="edit-delete"><a href="edit-product.php?proid=<?php echo $product_id; ?>">Edit</a> 
                    <a href="delete-product.php?proid=<?php echo $product_id; ?>">Delete</a></div>
                </div>
                <div class="detail-pro-details">

                    <div class="details-h3">
                        <h3>Name : <span><?php echo $rows['pro_name']; ?></span></h3>
                    </div> <hr>

                    <div class="details-h3">
                        <h3>Price : <span>RS. <?php echo $rows['pro_price']; ?> INR</span></h3>
                    </div> <hr>
                        <?php 

                            $stocksql = "SELECT * FROM `stock` WHERE `product_name` = '{$product_name}'";

                            $stockResult = mysqli_query($conn,$stocksql) or die("Stock Query Failed");

                            if(mysqli_num_rows($stockResult) >0){
                                while($stockrows = mysqli_fetch_assoc($stockResult)){
                                    $stockQuentity = $stockrows['quentity'];
                                }
                            }


                        ?>
                    <div class="details-h3">
                        <h3>Stock Remain: <span><?php echo $stockQuentity; ?><a href="detail-product.php?proname=<?php echo $product_name; ?>"> Add Stock</a></span></h3>
                    </div> <hr>

                    <div class="details-h3">
                        <h3>Details : </h3>
                    </div>
                    
                    <div class="detail-h3">
                        
                        <h3><span><?php echo $rows['pro_detail']; ?>
                        </span></h3>

                    </div>
                </div>
        </div>
    </div>

    </div>
    <?php } } }?>

   

</body>
</html>