<?php 
 include('hos-admin/include/config.php');
include("./include/header.php");
$order_Id = $_SESSION['orderId'];
?>
        <section class="cart__page">
        <div class="container" style="margin-top:5%;">
	<div class="row">
        <div class="jumbotron p-5 mb-5" style="box-shadow: 2px 2px 4px #000000;margin:auto;width:fit-content">
        <h2 class="text-center">YOUR ORDER HAS BEEN RECEIVED</h2>
          <h3 class="text-center">Thank you for your payment, it’s processing</h3>
          
          <p class="text-center">Your order # is: <?php echo $order_Id ?></p>
          <p class="text-center">You will receive an order confirmation email with details of your order and a link to track your process.</p>
            <center><div class="btn-group" style="margin-top:50px;">
                <a href="#" class="btn btn-lg btn-dark">CONTINUE</a>
            </div></center>
        </div>
	</div>
</div>
            <!-- <div class="black__section">
                <div class="container">
                    <p class="page__heading">Thank You</p>
                    <p class="tag__line">You have <span class="cart_total_product">0</span> item in your cart</p>
                </div>
            </div> -->
        </section>
        <?php include("./include/footer.php") ?>
