<?php
require('../dbconn.php');
require('../function.php');
$msg = '';

if (isset($_POST['submit'])) {
  $username = get_safe_value($con, $_POST['username']);
  $email = get_safe_value($con, $_POST['email']);
  $address = get_safe_value($con, $_POST['address']);
  $phone = get_safe_value($con, $_POST['phone']);
  $password = md5(get_safe_value($con,$_POST['password'])) ;
  $date = date('Y-m-d');
  $check_user = mysqli_num_rows(mysqli_query($con, "select * from customer where email='$email'"));
  if ($check_user > 0) {
?>
    <script>
      alert('email already exist!');
    </script>
<?php
  } else {
    $sql = "insert into customer(name,email,f_address,m_number,password,date) values('$username','$email','$address','$phone','$password','$date')";
    $res = mysqli_query($con, $sql);
    if ($res) {
      header('location:./login.php');
      die();
    } else {
      exit('INSERTING FAILED');
    }
  }
}
?>

<?php
    $msg='';
    if (isset($_POST['s_submit'])) {
        $name = get_safe_value($con,$_POST['name']);
        $s_password =md5(get_safe_value($con,$_POST['s_password']));
         
        $sql = "select * from customer where name='$name' and password='$s_password' "; 
        $res = mysqli_query($con,$sql);
     
        if(mysqli_num_rows($res) > 0)  
           {  
                $_SESSION['username'] = $name;
                $a = mysqli_fetch_assoc($res);
                $_SESSION['user_id'] = $a['cus_id'];                
                header("location:../html/index.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/login.css" />


  <title>Sign in & Sign up Form</title>

</head>

<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">



        <form method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="name" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="s_password" required>
          </div>
          <input type="submit" value="Login" class="btn solid" name="s_submit">
            <?php
              echo $msg;
            ?>
          </p>

        </form>

        <!Sign up form>
        

          <form method="POST" class="sign-up-form">
            <div class="input">
         <a href="../html/index.php"> <i class="fas fa-times-circle" style="color: black; font-size:32px;;"></i></a>
            </div>
            <h2 class="title">Sign up </h2>
            

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" pattern="[A-Za-z]{4,}" required>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            </div>
            <div class="input-field">
              <i class="fas fa-map-marker-alt"></i>
              <input type="text" placeholder="Full Address" name="address" required>
            </div>
            <div class="input-field">
              <i class="fas fa-phone-alt"></i>
              <input type="numeric" placeholder="Mobile Number" name="phone" pattern="[9]{1}[0-9]{9}" required>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" pattern=".{8,}" required>
            </div>
            <input type="submit" class="btn" value="Sign up" name="submit">
            <p class="social-text">
          </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <button name="s_up" value="s_up" class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>

      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Already Login ?</h3>
          <button name="s_in" value="s_in" class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>

      </div>
    </div>
  </div>

  <script src="../js/app.js"></script>
</body>

</html>