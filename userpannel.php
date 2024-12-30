
<?php
require('./assets/user-header.php');

?>

<section>
  <div class="head-h1"><h1 class="fw-bold display-6 mb-3">Your full details</h1></div>
</section>
<section class="panel-head">
   <div class="panel-content">
     <p>Account Number : <?php echo $rows['acc_number'];?></p>
     <p>Current Balance : <?php echo $transaction['account_balance'];?></p>
   </div>
</section>
<section class="user-pannel">  
  <div class="user-table">
   <table class="table table-dark table-striped">
   <tbody>
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
  </div>

  <div class="user-transaction">      
    <h2 class="fw-bold mb-3 text-white">Transaction</h2>  
    <form action="transaction.php" method="POST">
        <input type="text" name="acc_number" placeholder="account Number" required><br>
        <input type="number" name="amount" step="0.01" placeholder="enter amount" required><br>

        <div class="transaction-type">
          <label>Transaction Type:</label>
          <select name="transaction_type">
              <option value="Deposit">Deposit</option>
              <option value="Withdraw">Withdraw</option>
          </select><br>
        </div>

        <button type="submit">Submit</button>
    </form>
  </div>

</section>

<?php
  require('./assets/footer.php');
?>
