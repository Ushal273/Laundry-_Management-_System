<?php
@include("../dbconn.php");
global $product_name;
$product_name = array();
global $quantity;
$quantity = array();


if (isset($_POST['order_btn'])) {
    $user = $_SESSION['user_id'];
    $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE cus_id='$user'");
    $price_total = 0;
    $date = date("Y/m/d/h/i/sa");
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['item_name'];
            $quantity[] = $product_item['quantity'];
            $product_price = $product_item['price'] * $product_item['quantity'];
            $price_total = $price_total + $product_price;
        };
    };
    $total_product = implode(', ', $product_name);
    $total_quantity = implode(', ', $quantity);
    $detail_query = mysqli_query($con, "INSERT INTO `order`(`item_name`, `cus_id`, `quantity`, `price`, `date`) VALUES ('$total_product','$user','$total_quantity','$price_total','$date')") or die('query failed');
    $remove_cart = mysqli_query($con, "DELETE FROM `cart` WHERE cus_id = '$user'");
    if ($cart_query && $detail_query) {
        echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>" . $total_product . "</span>
            <span class='total'> total : Rs" . $price_total . "/-  </span>
         </div>
            <p>(*pay after service*)</p>
         </div>
            <a href='../html/order.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/cart.css">

</head>

<body>

    <?php include("../include/header.php"); ?>
    <?php include("../include/navcart.php"); ?>

    <div class="container">

        <section class="checkout-form">

            <h1 class="heading">Complete your order</h1>

            <form method="post">

                <div class="display-order">
                    <?php
                    $select_cart = mysqli_query($con, "SELECT * FROM `cart`;");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                            $grand_total = $total += $total_price;
                    ?>
                            <span><?= $fetch_cart['item_name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    <?php
                        }
                    } else {
                        
                    }
                    ?>
                    <span class="grand-total" > grand total : Rs<?= $grand_total; ?>/- </span>
                </div>


                <input type="submit"  value="order now" name="order_btn" class="btn" >
            </form>
            
          
            

        </section>

    </div>

    <!-- custom js file link  -->
    <script src="..shopping cart/js/script.js"></script>

</body>

</html>