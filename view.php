<?php
require_once("connect.php");
require('./assets/header.php');
?>
<div class="col-md-12">
   <section class="view-header">
     <div class="view-nav">
        <img src="images/bank-removebg.png" alt="">
        <p>ABC Bank Ltd</p>
    </div>
   </section>
    <section class="head-h1">
      <h1 class="fw-bold display-6 mb-3">View Users details</h1>
    </section>
    <div class="main-body">
        <style>
           @media print {
            .no-print {
                display: none;
            }
            .pannel-container{
                padding: 0px;
                width: 100%;
                margin: 0 auto;
                overflow: hidden;
                height: 100%;
                background: white;
                border: 0;
            }
            .table_body tr td{
                padding: 5px;
                font-size: 50px;   
                text-align: center;
          }
          .panel-footer{
                display: none;
          }
          .home-header {
            margin-top:30px;

          }
          .view-header{
            display:block;
            text-align:left;
          }
          .view-nav{
            width: 100%;
            margin: 0;
	        display: flex;
	        justify-content: start;
	        align-items: center;

         }
    }
        </style>

        <div class="panel-body pannel-container">

            <table class="table table-responsive table-striped table-hover table_cus ">
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
                <?php
                          error_reporting(0);
                           $sql= "SELECT * FROM `tb_customer_login`";
                           $result= mysqli_query($con,$sql);
                           $total= mysqli_num_rows($result);

                           if($total>0)
                           {
                          ?>
                <?php 

                          while($rows= mysqli_fetch_assoc($result))
                          {
                            echo"
                          <tbody class='table_body'>
                           <tr>
                            <td ><h5>".$rows['c_id']."</h5></td>
                            <td ><h5>".$rows['acc_number']."</h5></td>
                            <td ><h5>".$rows['c_name']."</h5></td>
                            <td ><h5>".$rows['c_email']."</h5></td>
                            <td ><h5>".$rows['address']."</h5></td> 
                            <td ><h5>".$rows['contact']."</h5></td>
                            <td ><h5>".$rows['nid_no']."</h5></td>
                           <td class='no-print'>
                                <a href='view-user.php?c_id=$rows[c_id]' title='View' class='all-view' ><i class='fa-solid fa-eye fa-lg'></i></a>
                                <a href='update-user.php?c_id=$rows[c_id]' title='Edit details' class='all-edit hidden-print' ><i class='fa fa-pencil-square fa-lg'></i></a>
                                <a href='deleteuser.php?c_id=$rows[c_id]' title='Delete Records' class='all-delete ' onclick='checkdelete()' ><i class='fa fa-trash fa-lg'></i></a>    
                            </td>
                           </tr>
                           </tbody >
                            ";
                          }

                           }else{
                              echo "No records present here....";
                           }

                       ?>

            </table>
            <div class="panel-footer">
            <div class="col-md-1">
                <input class="btn" style="background-color:#19465c; color:white;" type="submit"
                    onclick="printPage()" value="PRINT">
            </div>

            <div class="col-md-6">
            </div>

            <div class="clearfix"></div>
        </div>              
        </div>
    </div>
</div>
</div>
<!--col-md-12 end-->

<!-- JS  -->
<script>
function checkdelete() {
    return confirm('Are you sure you want to delete this record ?');
}

    // JavaScript function to trigger print
    function printPage() {
            window.print();
        }
</script>

<?php
  require('./assets/footer.php');
?>