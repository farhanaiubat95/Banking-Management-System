<?php
require('./assets/header.php');
?>
  <section class="head-h1">
      <h1 class="fw-bold display-6 mb-3 ">Search User Details</h1>
    </section>
<div class="panel-body" id="print-container">
    <?php
                          require("connect.php");
                           if(isset($_POST['search']))
                           {
                            $filtervalue=$_POST['search'];
                            $sql="SELECT * FROM tb_customer_login WHERE CONCAT(acc_number,c_name) LIKE '%$filtervalue%'";

                           }else
                           {
                            $sql="SELECT * FROM tb_customer_login";
                            $filtervalue="";
                           }

                           $result=mysqli_query($con,$sql);
                        
                        ?>
    <div class="search">
        <form action="" method="POST">
            <input type="text" class="search-text hidden-print" name="search" value="<?php echo $filtervalue; ?>"
                placeholder="account number or name">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

    <br>
    <table class="table table-responsive table-striped table-hover table_cus">
        <thead class="table_head">
        <tr>
          <th>ID</th>
          <th>Account Number</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Contact</th>
          <th>NID No</th>
          <th class="no-print">Manage</th>
        </tr>
        </thead>

        <tbody class='table_body'>
            <?php
                                while($rows=mysqli_fetch_object($result))
                                    {
                                        ?>
        <tbody class='table_body'>
            <tr>
                <td>
                    <h5><?php echo $rows->c_id ?></h5>
                </td>
                <td>
                    <h5><?php echo $rows->acc_number ?></h5>
                </td>
                <td>
                    <h5><?php echo $rows->c_name ?></h5>
                </td>
                <td>
                    <h5><?php echo $rows->c_email?></h5>
                </td>
                <td>
                    <h5><?php echo $rows->address?></h5>
                </td>
                <td>
                    <h5><?php echo $rows->contact ?></h5>
                </td>
                <td>
                    <h5><?php echo $rows->nid_no ?></h5>
                </td>
                <td>
                    <a href='view-user.php?c_id=<?php echo $rows->c_id ?>;' title='View' class='all-view hidden-print'><i
                            class='fa-solid fa-eye fa-lg'></i></a>
                    <a href='update-user.php?c_id=<?php echo $rows->c_id ?>;' title='Edit details'
                        class='all-edit hidden-print'><i class='fa fa-pencil-square fa-lg'></i></a>
                    <a href='deleteuser.php?c_id=<?php echo $rows->c_id ?>;' title='Delete Records'
                        class='all-delete hidden-print' onclick='return checkdelete()'><i
                            class='fa fa-trash fa-lg'></i></a>
                </td>
            </tr>

            <?php
            }

            ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
<!--col-md-12 end-->

<script>
function checkdelete() {
    return confirm('Are you sure you want to delete this record ?');
}


</script>
<?php
  require('./assets/footer.php');
?>