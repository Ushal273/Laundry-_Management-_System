<style>

    </style>
<nav>
    <a style="color: black;" href="../html/index.php">dHobI</a>
    <div class="nav-links"  id="navlinks">
        <i class="fas fa-times" onclick="hideMenu()"></i>
        <ul>
            <li><a style="color: black;" href="../html/index.php">Home</a></li>
            <li><a style="color: black;" href="../html/Categories.php">Categories</a></li>
            <li><a style="color: black;" href="../html/order.php">Order</a></li>
            <li><a style="color: black;" href="../html/contact.php">Contact</a></li>
            <li><a style="color: black;" href="../html/about.php">AboutUs</a></li>
            <i class="far fa-shopping-cart"></i>

            <?php
            if (!isset($_SESSION['username'])) {
            ?>
            <li><a href="../login/login.php">Login</a></li>
            <?php
            } else {
                ?>
                
                <li><a href="../user/dashboard.php">Hello  <?php echo $_SESSION['username'];  ?> </a> </li>                
            <?php
            }
            ?>
        </ul>
    </div>
    <i class="fas fa-bars" onclick="showMenu()"></i>
</nav>