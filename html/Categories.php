<?php
session_start();
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
            <p>Hotels, corporate offices, hospitals, hostels, restaurants and local customers.
Laundry services through ecofriendly chemicals.
Dry cleaning services.
Carpet shampoo of offices and homes.
Deep cleaning/one day cleaning</p>
           
        <div class="row">
            <div class="clothes-col">
                <h3>Household</h3>
                <p>We provide washing services to all house-holds items available in Biratnagar which includes carpets, curtains, bedding,etc</p>
            </div>

            <div class="clothes-col">
                <h3>Garments</h3>
                <p>We provide washing services to all casual wears of people of Biratnagar</p>
               
            </div>
        </div>
        <a href="sub-categories.php" class="hi-btn blue-btn">Click Here to known More</a>
        </section>

      

        <!---Footer--->
<?php
    include('../include/footer.php');
?>