<?php
include('../dbconn.php');

// session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "Access Denied";
    header('location:../login/login.php');
}
?>
<!doctype html>
<html lang="en">
<script>


</script>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom Css -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Fontawesome CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-1/css/all.min.css" integrity="sha512-wDB6AYiYP4FO5Sxieamqy9wtpAY3qdHMqlhZecIEUu1YjkLw5gQf/4ZDgOzmCBAF5SheMjmugkpUSVoUrGbLkQ==" crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Order-History</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top ">
        <a class="navbar-brand text-white font-weight-bold py-1 font-25" href="../html/index.php">Dobhi</a>
        <div class="dropdown ml-auto">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome! <?php echo $_SESSION['username'] ?> <i class="fas fa-user pl-1"></i>

            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="./logout.php"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
            </div>
        </div>
        </div>

    </nav>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 mt-3">
                <div class="shadow">
                    <p class="text-center font-weight-bold text-white p-2 bg-dark">Your Order History</p>
                    <div class="p-5 table-responsive">
                        <table class="table table-bordered my-2">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">SN</th>
                                    <th class="text-center" scope="col">Item Name</th>
                                    
                                    <th class="text-center" scope="col">Total Price</th>
                                    <th class="text-center" scope="col">Date ordered</th>
                                    <th class="text-center" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user = $_SESSION['user_id'];
                                $sql = "SELECT * FROM `order` WHERE cus_id = '$user'";
                                $i = 1;


                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    
                                    while ($data = mysqli_fetch_array($result)) {
                                        
                                        $userid = $data['cus_id'];

                                ?>



                                        <tr>
                                            <th class="text-center" scope="row"><?php echo $i; ?></th>
                                            <td class="text-center"><?php echo $data['item_name']; ?></td>
                                            <td class="text-center"><?php echo $data['price']; ?></td>
                                            <td class="text-center"><?php echo $data['date']; ?></td>
                                            <td class="text-center">
                                            <?php
                                                if ($data['status'] == 1) {
                                                    echo '<p>  <a href="status.php?id=' . $data['o_id'] . '&status=0" class="btn btn-success disabled"> Completed </a> </p>';
                                                } 
                                                elseif ($data['status'] == 2) {
                                                    echo '<p>  <a href="status.php?id=' . $data['o_id'] . '&status=1" class="btn btn-primary disabled">Will completed in 1 day </a> </p>';
                                                } 
                                                elseif ($data['status'] == 3) {
                                                    echo '<p>  <a href="status.php?id=' . $data['o_id'] . '&status=2" class="btn btn-primary disabled"> Will completed in 2 days </a> </p>';
                                                }
                                                elseif ($data['status'] == 4) {
                                                    echo '<p>  <a href="status.php?id=' . $data['o_id'] . '&status=3" class="btn btn-primary disabled"> Will completed in 3 days </a> </p>';
                                                }
                                                
                                                else {
                                                    echo '<p>  <a href="status.php?id=' . $data['o_id'] . '&status=4" class="btn btn-danger disabled"> Pending</a> </p>';
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                <?php
                                        $i++;
                                    }
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
</body>

</html>