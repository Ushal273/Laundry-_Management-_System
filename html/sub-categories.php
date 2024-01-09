<?php
include('../dbconn.php');
//session_start();
include('../include/header.php');
?>
<section class="sub-header">
    <?php
    include('../include/nav.php');
    ?>

    <h1>Categories</h1>
</section>
<!----for categories--->
<section class="clothes">
    <h1> We offer You!!</h1>
    <p>Hotels, corporate offices, hospitals, hostels, restaurants and local customers. Laundry services through ecofriendly chemicals. Dry cleaning services. Carpet shampoo of offices and homes. Deep cleaning/one day cleaning</p>

    <div class="row">
        <div class="clothes-col1">
            <h3>Household</h3>
           <?php
            $household = "SELECT * FROM item WHERE cat_id = 1";
            $result = mysqli_query($con,$household);
            // $data = mysqli_fetch_assoc($result);
            foreach($result as $row){
                ?>
                <a href="./order.php"><?php echo $row['item_name']; ?></a><br>
                <?php
            }
           ?>
            
           


        </div>

        <div class="clothes-col1">
            <h3>Garments</h3>
            <?php
            $garment = "SELECT * FROM item WHERE cat_id = 2";
            $result = mysqli_query($con,$garment);
            // $data = mysqli_fetch_assoc($result);
            foreach($result as $row){
                ?>
                <a href="./order.php"><?php echo $row['item_name']; ?></a><br>
                <?php
            }
           ?>

        </div>

    </div>
</section>



<!---Footer--->
<?php
include('../include/footer.php');
?>