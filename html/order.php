<?php
include('../dbconn.php');

include('../include/header.php');
?>
<?php

if (isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        $item_id = $_POST["item_id"];
        $item_name = $_POST["item_name"];
        $price = $_POST["price"];
        $quantity = 1;
        $user = $_SESSION["user_id"];

        $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE item_name = '$item_name' AND cus_id = '$user'");

        if (mysqli_num_rows($select_cart) > 0) {
            echo '<script>alert("Product already added to cart")</script>';
        } else {
            $insert_product = mysqli_query($con, "INSERT INTO `cart`(`cus_id`, `item_id`, `item_name`, `price`, `quantity`) VALUES('$user', '$item_id','$item_name', '$price', '$quantity')");
            echo '<script>alert("Product added to cart succesfully")</script>';
        }
    }
} else {
    header('location:../login/login.php');
}

?>

<section class="sub-header">
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
    };
    include('../include/nav.php');
    ?>

    <h1>Order</h1>
</section>



<section class="container content-section">
    <br>
    <h2 class="section-header">Household</h2>
    <div class="row">

        <div class="col-sm-12 col-md-6">
            <div class="shop-items">

                <?php
                $sql = "SELECT * FROM item WHERE cat_id=1";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) {
                ?>
                        <div class="col-sm-12 col-md-6">
                            <div class="shop-item">
                                <form action="" method="POST">
                                    <span class="shop-item-title"><?php echo $row['item_name']; ?></span>
                                    <img class="shop-item-image" height="270px" width="350px" src="../admin/uploads/<?php echo $row['image']; ?>">
                                    <div class="shop-item-details">
                                        <span class="shop-item-price">Rs<?php echo $row['price']; ?> per piece</span>
                                        <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                                        <input type="hidden" name="item_name" value="<?php echo $row['item_name'] ?>">
                                        <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>">
                                        <input class="btn btn-primary " name="submit" value="ADD TO CART" type="submit">
                                </form>
                            </div>
                        </div>
            </div>
        <?php } ?>

    <?php } ?>
        </div>
    </div>

    </div>
</section>


<style type="text/css">
    hr {
        width: 70%;
        margin: auto;
        position: relative;
        height: 3px;
        background: black;
        margin-bottom: 50px;
    }
</style>
<hr>

<section class="container content-section">
    <br>
    <h2 class="section-header">Garments</h2>
    <div class="row">

        <div class="col-sm-12 col-md-6">
            <div class="shop-items">

                <?php
                $sql = "SELECT * FROM item WHERE cat_id=2";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) {
                ?>
                        <div class="col-sm-12 col-md-6">
                            <div class="shop-item">
                                <form action="" method="POST">
                                    <span class="shop-item-title"><?php echo $row['item_name']; ?></span>
                                    <img class="shop-item-image" height="270px" width="350px" src="../admin/uploads/<?php echo $row['image']; ?>">
                                    <div class="shop-item-details">
                                        <span class="shop-item-price">Rs<?php echo $row['price']; ?> per piece</span>
                                        <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                                        <input type="hidden" name="item_name" value="<?php echo $row['item_name'] ?>">
                                        <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>">
                                        <input class="btn btn-primary " name="submit" value="ADD TO CART" type="submit">
                                </form>
                            </div>
                        </div>
            </div>
        <?php } ?>

    <?php } ?>
        </div>
    </div>

    </div>
</section>
<br>




<!---About Us--->
<?php
include('../include/footer.php');
?>