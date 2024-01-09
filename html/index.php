<?php
include('../dbconn.php');
//session_start();
include('../include/header.php');
?>

<section class="header">
    <?php
    include('../include/nav.php');
    ?>
    <div class="text-box">
        <h1>dHobI</h1>
        <p>Welcome to Dhobi. We provide clean services in Biratnagar with new technology and qualified technician , with the motto of Clean Nepal, Healthy Nepal. We are here with the most professional cleaning techniques in Nepal.</p>
        <a href="about.php" class="hi-btn">Click Here to known More</a>
    </div>
</section>

<!----for categories--->
<section class="clothes">
    <h1> We offer You!!</h1>
    <div class="row">
        <div class="clothes-col1">
            <h3>Household</h3>
            <?php
            $household = "SELECT * FROM item WHERE cat_id = 1";
            $result = mysqli_query($con, $household);
            // $data = mysqli_fetch_assoc($result);
            foreach ($result as $row) {
            ?>
            <?php echo $row['item_name']; ?></a><br>
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
                <?php echo $row['item_name']; ?></a><br>
                <?php
            }
           ?>

        </div>
    </div>
    <a href="categories.php" class="hi-btn blue-btn">Click Here to known More</a><br>
</section>



<!--------Contact---->
<section class="cta">
    <h1>Get in Touch with us</h1>
    <a href="contact.php" class="hi-btn">Contact Us</a>
</section>
<?php
include('../include/footer.php');
?>