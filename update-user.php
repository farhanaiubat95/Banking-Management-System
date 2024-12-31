<?php
session_start();
?>

<?php
    require('./assets/header.php');
?>

<?php
  require('connect.php');
  error_reporting(0);
  $c_id= $_GET['c_id'];
  $sql="SELECT * FROM `tb_customer_login` WHERE c_id='$c_id'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
  $c_id= $_GET['c_id'];
  $c_name=$_POST['c_name'];
  $acc_number=$_POST['acc_number']; 
  $f_name=$_POST['f_name'];
  $m_name=$_POST['m_name'];
  $c_email=$_POST['c_email'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $nid_no=$_POST['nid_no'];


$sql="UPDATE `tb_customer_login` SET `c_name`='$c_name',`acc_number`='$acc_number',`f_name`='$f_name',`m_name`='$m_name',`c_email`='$c_email',`address`='$address',`contact`='$contact',`nid_no`='$nid_no' WHERE c_id='$c_id'";

$result=mysqli_query($con,$sql);
If($result)
{
  echo"
  <script>
  alert('Record updated successfully');
  window.location.href='view.php';
  </script>
  ";
}else{
  echo"
  <script>
  alert('Failed to update');
  window.location.href='search.php';
  </script>
  ";
  }
}
?>
    <section>
      <h1 class="text-dark fw-bold display-6">Update User details</h1>
    </section>
    <form class="register-form" action="#" method="POST"  enctype="multipart/form-data" >
        <div class="form-row">
            <div class="form-group">
                <label for="customerName">Customer's Name:</label>
                <input type="text" id="customerName" name="c_name" value="<?php echo $rows['c_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="accountNumber">Account Number:</label>
                <input type="number" id="accountNumber" name="acc_number" value="<?php echo $rows['acc_number'] ?>" required>
            </div>
            <div class="form-group">
                <label for="fatherName">Father's Name:</label>
                <input type="text" id="fatherName" name="f_name" value="<?php echo $rows['f_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="motherName">Mother's Name:</label>
                <input type="text" id="motherName" name="m_name" value="<?php echo $rows['m_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="customerEmail">Customer's Email:</label>
                <input type="email" id="customerEmail" name="c_email" value="<?php echo $rows['c_email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $rows['address'] ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="number" id="contact" name="contact" value="<?php echo $rows['contact'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nidNo">NID No:</label>
                <input type="number" id="nidNo" name="nid_no" value="<?php echo $rows['nid_no'] ?>" required>
            </div>
        </div>
        <input class="reg-log-btn" type="submit" name="update" value="Update">
    </form>

    
<?php
  require('./assets/footer.php');
?>
