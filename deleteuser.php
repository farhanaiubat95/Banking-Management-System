<?php
  require ('connect.php');
  $c_id=$_GET['c_id'];
  $query="DELETE FROM `tb_customer_login` WHERE c_id='$c_id'";
  $data=mysqli_query($con,$query);

  if($data)
  {
    echo"
    <script>
    alert('Deleted successfully');
    </script>
    ";
    ?>
      <meta http-equiv="refresh" content="0;url=http://localhost/Bank/view.php" />
    <?php
  }else{
    echo"
    <script>
    alert('Not Deleted. Check again');
    window.location.href='search.php';
    </script>
    ";
  }

?>