<?php

require_once("connect.php");


if(isset($_POST['userlog']))
{
  $acc_num=$_POST["acc_number"];
  $pass=$_POST["password"];

  $sql = "select * from tb_customer_login where acc_number = '$acc_num' and password = '$pass'";  

    $result=mysqli_query($con,$sql);
    
    // Check if account number and password exist in the database
    if(mysqli_num_rows($result)==1)
    {
      session_start();
      $rows=mysqli_fetch_assoc($result);
      $_SESSION[`c_id`]=$rows['c_id'];
      echo"
      <script>
      alert('Log in successfully'); 
       window.location.href='userpannel.php';
      </script>
      ";
    }else{
      echo"
      <script>
      alert('Not login'); 
       window.location.href='user-login.php';
      </script>
      ";
    }
}

?>
<?php
  require('./assets/header.php');
?>

<section class="head-h1">
      <h1 class="fw-bold display-6">Please Login</h1>
    </section>
    <form class="register-form" action="#" method="POST">
            <div class="form-group">
                <label for="accountNumber">Account Number:</label>
                <input type="number" id="accountNumber" name="acc_number" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>
        <input class="reg-log-btn" type="submit" name="userlog" value="Submit">
    </form>
<?php
  require('./assets/footer.php');
?>

