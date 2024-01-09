<?php
session_start();
include('../include/header.php');
?>

<section class="sub-header">
    <?php
    include('../include/nav.php');
    ?>
    <h1>Contact Us</h1>
</section>

<!--Contac Us-->
<section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114311.47785847103!2d87.20176675780814!3d26.44819537854949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef744704331cc5%3A0x6d9a85e45c54b3fc!2sBiratnagar%2056613!5e0!3m2!1sen!2snp!4v1650861139651!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section class="contact-us">
    <div class="row">
        <div class="contact-col"></div>
        <div>
            <i class="fas fa-home " style="color: goldenrod;"></i>
            <span>
                <h5>ABC Road, EFG Building</h5>
                <p>Biratnagar,Morang,Nepal</p>
            </span>
        </div>

        <div>
            <i class="fas fa-phone"style="color:black ;"></i>
            <span>
                <h5>9876543210</h5>
                <p>Sunday-Friday, 10AM to 7PM</p>
            </span>
        </div>
        <div>
            <i class="fas fa-envelope"style="color: dimgrey;"></i>
            <span>
                <h5>laundryservice101@xyz.com</h5>
                <p>Email us your query</p>
            </span>
        </div>
</section>




<!---About Us--->
<?php
include('../include/footer.php');
?>