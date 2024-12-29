<?php
session_start();
require("connect.php");
$c_id=$_SESSION[`c_id`];
$sql = "select * from tb_customer_login where c_id = '$c_id'";  
$data=mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($data);


if(isset($_POST['logout'])){
    session_destroy();
    echo"
    <script>
    alert('Log out successfully'); 
     window.location.href='user-login.php';
    </script>
    ";
}

if(!isset($_SESSION[`c_id`])) {
    header('location: user-login.php');
}

$transactionQuery = "SELECT account_balance FROM transactions WHERE c_id = '$c_id' ORDER BY t_id DESC LIMIT 1";
$transactionResult = mysqli_query($con, $transactionQuery);
$transaction = mysqli_fetch_assoc($transactionResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="home-header">
    <nav class="home-nav">
        <div class="nav-img">
          <img src="images/bank-removebg.png" alt="">
          <p>ABC Bank Ltd</p>
        </div>
        <div class="nav-menu">
        <a href="#">
        <form class="logout-form" action="#" method="POST">
           <button type="submit" name="logout">Logout</button>
           <a href=""></a>
        </form>
        </a>
        <a href='report.php?c_id=<?php echo $c_id; ?>'>Report</a>        
        </div>
    </nav>
