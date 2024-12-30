<?php

require_once("connect.php");

$c_name=$_POST['c_name']; 
$acc_number=$_POST['acc_number']; 
$f_name=$_POST['f_name'];
$m_name=$_POST['m_name'];
$c_email=$_POST['c_email'];              
$address=$_POST['address'];
$contact=$_POST['contact'];
$nid_no=$_POST['nid_no'];
$password=$_POST['password'];



$sql="INSERT INTO `tb_customer_login`(`c_id`, `c_name`, `acc_number`, `f_name`, `m_name`, `c_email`, `address`, `contact`, `nid_no`, `password`) VALUES ('null','$c_name','$acc_number','$f_name','$m_name','$c_email','$address','$contact','$nid_no','$password')";
$query=mysqli_query($con,$sql);

if($query)
{
  session_start();
  echo"
  <script>
  alert('Registered successfully');
  window.location.href='user-login.php';
  </script>
  ";
}
else{
  echo"
  <script>
  alert('Not Inserted. Check again');
  window.location.href='user-register.php';
  </script>
  ";
}

mysqli_close($con);
?>
