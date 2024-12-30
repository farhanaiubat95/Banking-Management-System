<?php

require('./assets/header.php');
?>

<section class="user-pannel">
    <?php
        require("connect.php");
        $c_id=$_GET['c_id'];
        $sql = "select * from tb_customer_login where c_id = '$c_id'";  
        $data=mysqli_query($con,$sql);
        $rows=mysqli_fetch_assoc($data);
    ?>
    <table class="table table-dark table-striped">
        <tbody>
            <tr class="table-success fw-bold">
                <td scope="row">Account Number :</td>
                <td scope="row"><?php echo $rows['acc_number'];?></td>
            </tr>
            <tr>
                <td scope="row">Customer Name :</td>
                <td scope="row"><?php echo $rows['c_name'];?></td>
            </tr>
            <tr>
                <td scope="row">Father's Name :</td>
                <td scope="row"><?php echo $rows['f_name'];?></td>
            </tr>
            <tr>
                <td scope="row">Mother's Name :</td>
                <td scope="row"><?php echo $rows['m_name'];?></td>
            </tr>
            <tr>
                <td scope="row">Email :</td>
                <td scope="row">
                    <a class="text-success" href="<?php echo $rows['c_email'];?>"><?php echo $rows['c_email'];?></a>
                </td>
            </tr>
            <tr>
                <td scope="row">Address :</td>
                <td scope="row"><?php echo $rows['address'];?></td>
            </tr>
            <tr>
                <td scope="row">Contact :</td>
                <td scope="row"><?php echo $rows['contact'];?></td>
            </tr>
            <tr>
                <td scope="row">NID No :</td>
                <td scope="row"><?php echo $rows['nid_no'];?></td>
            </tr>

        </tbody>
    </table>
</section>

<?php
  require('./assets/footer.php');
?>