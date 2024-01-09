<?php
    require('../dbconn.php');
    require('../function.php');
    $msg='';
    if (isset($_POST['submit'])) {
        $username = get_safe_value($con,$_POST['username']);
        $password = get_safe_value($con,$_POST['password']);
        $sql = "select * from admin where username='$username' and password='$password' "; 
        $res = mysqli_query($con,$sql);
        $count = mysqli_num_rows($res);
        if ($count>0) {
            $_SESSION['ADMIN_LOGIN']='yes';
            $_SESSION['ADMIN_NAME']=$username;
            header('location:../admin/dashboard.php');
        }else {
            $msg="please enter the correct login details";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous" ></script>
    <link rel="stylesheet" href="../css/login.css" />
   
    
    <title>Sign in & Sign up Form</title>
    
  </head>
  <body>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          
          
          <form  method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username"  name="username" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" value="Login" class="btn solid" name="submit" />
         
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already Login ?</h3>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <?php
          echo $msg;
          ?>
        </div>
      </div>
    </div>

    <script src="../js/app.js"></script>
  </body>
</html>