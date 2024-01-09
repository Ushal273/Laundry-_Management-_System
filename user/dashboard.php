<?php
include('../dbconn.php');

if (!isset($_SESSION['username'])) {
    header('location:../login/login.php');
}
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $user = $_SESSION['user_id'];
    $query = "UPDATE `cart` SET quantity = '$update_value' WHERE item_id = '$update_id' AND cus_id = '$user'";
    $update_quantity_query = mysqli_query($con, $query);
    if ($update_quantity_query) {
        header('location:dashboard.php');
    };
};

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    $user = $_SESSION['user_id'];

    mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id' AND cus_id = '$user'");
    header('location:dashboard.php');
};

if (isset($_GET['delete_all'])) {
    $user = $_SESSION['user_id'];
    mysqli_query($con, "DELETE FROM `cart` WHERE cus_id ='$user'");
    header('location:dashboard.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../css/cart.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Order-History</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top ">
        <a class="navbar-brand text-white font-weight-bold py-3 font-55" href="../html/index.php"><h2>Dhobi</h2> </a>
        <div class="dropdown ml-auto">
            
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <h3> Welcome! User</h3> <i class="fas fa-user pl-1"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="./history.php"><span><h2>History</h2></span></a> 
                <a class="dropdown-item" href="./logout.php"><span><h2>Logout</h2></span></a>               
            </div>
        </div>
        </div>

    </nav>




    <div class="container-fluid">
        <div class="row mx-5 mt-5">
            <div class="col-12 mt-5">
                <div class="shadow">
                    <p class="text-center font-weight-bold text-white p-2 bg-dark heading">Update-Order </p>
                    <div class="p-5 table-responsive">
                        <section class="shopping-cart">
                            <table>
                                <?php $user_id_1 = $_SESSION['user_id'];
                                $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE cus_id = '$user_id_1'");



                                if (mysqli_num_rows($select_cart) > 0) {
                                ?>
                                    <thead>

                                        <th>S.N.</th>
                                        <th>name</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        <th>total price</th>
                                        <th>action</th>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $i = 1;
                                        $grand_total = 0;

                                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                        ?>

                                            <tr>

                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $fetch_cart['item_name']; ?></td>
                                                <td>Rs<?php echo $fetch_cart['price']; ?>/-</td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['item_id']; ?>">
                                                        <input type="number" name="update_quantity" min="1" max="20" value="<?php echo $fetch_cart['quantity']; ?>">
                                                        <input type="submit" value="update" name="update_update_btn">
                                                    </form>
                                                </td>
                                                <td>Rs<?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; ?>/-</td>
                                                <td>
                                                    <form method="GET"><a href="dashboard.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></form>
                                                </td>
                                            </tr>
                                        <?php
                                            $grand_total = $grand_total + $sub_total;
                                            $i++;
                                        };

                                        ?>
                                        <tr class="table-bottom">
                                            <td><a href="../html/order.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
                                            <td colspan="3">grand total</td>
                                            <td>Rs<?php echo $grand_total; ?>/-</td>
                                            <td><a href="dashboard.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
                                        </tr>

                                    </tbody>
                                    </table>

                                <?php } else { ?>
                                    <h5 class="text-center" style="font-size: 3rem;"> You havent ordered anything yet <h5>

                                        <?php } ?>
                                        <div class="checkout-btn">
                                            <a  style="font-size: 1rem; text-decoration:none" class="btn btn-primary" <?php if(mysqli_num_rows($select_cart)==0){ ?> href="../html/order.php" <?php } else{?> href="checkout.php" <?php } ?>>
                                                <h3>
                                                <?php if(mysqli_num_rows($select_cart)==0){ ?>Continue shopping<?php } else{ ?> Proceed to checkout <?php }?>
                                                </h3>
                                            </a>
                                        </div>
                          

                        </section>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>