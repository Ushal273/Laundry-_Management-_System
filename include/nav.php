
<nav>
    <a href="index.php">dHobI</a>
    <div class="nav-links" id="navlinks">
        <i class="fas fa-times" onclick="hideMenu()"></i>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Categories.php">Categories</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php" >AboutUs</a></li>
           
            <?php
            if (!isset($_SESSION['username'])) {
            ?>
            
            <li><a href="../login/login.php">Login</a></li>
            <?php
            } else {
                ?>          
                <li><a href="../user/dashboard.php">Hello  <?php echo $_SESSION['username'];?> <i class="fa-solid fa-cart-shopping"></i> </a> </li>  
                            
            <?php
            }
            ?>
        </ul>
    </div>
    <i class="fas fa-bars" onclick="showMenu()"></i>
</nav>