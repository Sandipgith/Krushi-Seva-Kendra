<?php include 'admin-dashboard.php'; ?>

<?php 

if(isset($_GET['billid'])){
    $order_id =  $_GET['billid'];
    $date = date("d - M - Y");
include '../db_connection.php';
    $order = "SELECT * FROM `order` WHERE `id` = {$order_id }";

    $order_result = mysqli_query($conn,$order) or die("Order Query Failed");

    if(mysqli_num_rows($order_result) > 0){
        while($or = mysqli_fetch_assoc($order_result)){

                $id = $order_id;
                $name = $or['name'];
                $number = $or['number'];
                $email = $or['email'];
                $method = $or['method'];
                $flat = $or['flat'];
                $street = $or['street'];
                $city = $or['city'];
                $state = $or['state'];
                $country = $or['country'];
                $pin_code = $or['pin_code'];
                $products = $or['total_products'];
                $total_price = $or['total_price'];
        }
    }

    $pro = explode(",",$products);
    
    echo "
      <div class='order-message-container'>
      <div class='bill-main-div'>
       <div class='message-container'>
            <div class='message-container'>
                        <div class='check-bill'>
                        
                            <div id='bill-top'>
                                    <div class='bill-title'>
                                        <h1>Waghjai Krushi Seva Kendra</h1>
                                    </div>
                            </div>
                            <div id='bill-user-detials'>
                                    <div class='bill-head'>
                                        <div><p>Bill No : <span>".$id."</span></p></div>
                                        <div><p>Date : <span>".$date."</span></p></div>
                                    </div>
                            </div>
                            <div id='bill-hr'>
                                <hr>
                            </div>
                            <div class='check-address'>
                              <div>
                                    <div class='check-from'>
                                        <h4>From : <br><span>Waghjai Krushi Seva Kendra</span> <h4>
                                    </div>

                                    <div class='check-from'>
                                        <h4>To : <br><span>".$name.",".$street." </br> <span>".$city." -".$pin_code." </span></br><span>Tal - ".$city."</span> </br><span>".$state." , ".$country."</span></h4>
                                    </div>
                              </div>
                              <div>
                                    <div class='check-from'>
                                        <h4>Payment Status : <br><span>".$method." </br> <span>Dilivery Date : ".$date."</span></br><span>Total Payment : ".$total_price.".00 /-</span> </h4>
                                    </div>

                                    <div class='check-from'>
                                        <h4>Contact : <br><span>+91 ".$number."</br> <span>".$email."</span></h4>
                                    </div>
                              </div> 
                            </div>
                            <div id='bill-hr'>
                                <hr>
                            </div>
                            <div class='check-product'>
                            
                            <h4>Products : </h4>
                            <h5>
                            
                            
                            <table  class='bill-table'>
                                <thead>
                                    <th>SR.NO</th>
                                    <th>Product Name</th>
                                    <th>Quentity</th>
                                    <th>Rate</th>
                                    <th>Total Amount</th>
                                </thead>
                                <tbody> ";
                                $size = sizeof($pro);
                          
                                for($i = 0; $i < $size; $i++){
                                    $num = $i+1;
                                    $proquentity = explode("=",$pro[$i]);
                                    $proname = explode("(",$pro[$i]);
                                    $proprice = explode("/",$pro[$i]);
                                    $total_amount = ((int)$proquentity[1] * (int)$proprice[1]);
                                    // echo"<pre>";
                                    // print_r($total_amount);
                                    // echo"</pre>";
                                    echo "<tr>
                                    <td>$num</td>
                                    <td>$proname[1]</td>
                                    <td>$proquentity[1]</td>
                                    <td>$proprice[1]</td>
                                    <td>$total_amount</td>
                                </tr>";
                                
                            }?>
                                    
                                </tbody>
                            </table>
                            <?php
                
                            echo"</h5>
                            
                            </div>

                            <div id='bill-hr'>
                                <hr>
                            </div>

                            <div class='check-amount'>
                            
                            <h4>Total : ".$total_price.".00</h4>
                            <h4>Amount Paid : ".$total_price.".00</h4>

                            </div> 
                            <div id='bill-hr'>
                                <hr>
                            </div>
                            <div class='check-thank'>
                            <h2>** Thank You For Shopping **</h2>
                            </div>

                        </div> 
                </div>

                <div class='check-button'>
                <button onclick='printPage()'>Print Bill</button>
                <a href='order.php'>Cancle</a>
                </div>
                    
         </div>
         </div>
    </div>
   
    ";
}

?>




<title>Orders</title>
    <div class="dash-page-title">
        <h1>Customers Orders</h1>
    </div>

    <div class="order-main-div">
        <div class="order-sub-div">

        <?php 
        
        include '../db_connection.php';
        
        $sql = "SELECT * FROM `order` ORDER BY `id` DESC";

        $result = mysqli_query($conn,$sql) or die("Query Failed");

        if(mysqli_num_rows($result) > 0){
        ?>



            <table>
                <thead>
                    <th>SR.NO</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Method</th>
                    <th>flat</th>
                    <th>street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Pin Code</th>
                    <th>Products</th>
                    <th>Total Amount</th>
                    <!-- <th>Status</th> -->
                    <th id="print-bill-td">Action</th>
                   
                    
                </thead>

                <tbody>
                <?php 
               $srno = 0;
               while($rows = mysqli_fetch_assoc($result)){
                $srno+=1;
               ?> 
                    <tr>
                        <td><?=$srno;?></td>
                        <td><?=$rows['name'];?></td>
                        <td><?=$rows['number'];?></td>
                        <td><?=$rows['email'];?></td>
                        <td><?=$rows['method'];?></td>
                        <td><?=$rows['flat'];?></td>
                        <td><?=$rows['street'];?></td>
                        <td><?=$rows['city'];?>r</td>
                        <td><?=$rows['state'];?></td>
                        <td><?=$rows['country'];?></td>
                        <td><?=$rows['pin_code'];?></td>
                        <td><?=substr($rows['total_products'],0,10)."...";?></td>
                        <td><?=$rows['total_price'];?>/-</td>
                        <!-- <td>Pending</td> -->
                        <td id="generate-bill"><a href="order.php?billid=<?=$rows['id'];?>" id="print-bill">Generate Bill</a></td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{?>
                <div style="text-align:center;margin:50px 0px;color:gray;">
                    <h3>No Orders Founds</h3>
                </div>
            <?php } ?>
        </div>
    </div>





</body>

<script type='text/javascript'>
    
    function printPage(){
        var body = document.querySelector(".order-message-container").innerHTML;
        var data = document.querySelector(".check-bill").innerHTML;
        document.querySelector(".order-message-container").innerHTML = data;
        window.print();
        document.querySelector(".order-message-container").innerHTML = body;
    }
    
    </script>
</html>