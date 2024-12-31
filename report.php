<?php
require_once("connect.php");
if(isset($_POST['logout'])){
    session_destroy();
    echo"
    <script>
    alert('Log out successfully'); 
     window.location.href='user-login.php';
    </script>
    ";
}

$c_id = $_GET['c_id'];

// Get Customer Info
$customerQuery = "SELECT * FROM tb_customer_login WHERE c_id = '$c_id'";
$customerResult = $con->query($customerQuery);
$customer = $customerResult->fetch_assoc();

// Get Transactions
$transactionAmmount = "SELECT * FROM transactions WHERE c_id = '$c_id' ORDER BY t_id DESC LIMIT 1";
$transactionResults = $con->query($transactionAmmount);
$transaction = $transactionResults->fetch_assoc();

$transactionQuery = "SELECT * FROM transactions WHERE c_id = '$c_id'";
$transactionResult = $con->query($transactionQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Transaction Receipt</title>
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/report.css">
</head>
<body>
    <nav class="rep-nav">
        <div class="rep-menu">
        <a href='userpannel.php'>Back</a> 

        <form action="#" method="POST">
          <button type="submit" name="logout">Logout</button>

        </form>
        </a>       
        </div>
    </nav>

    <div class="receipt">
      <div class="receipt-header">
        <div class="nav-img">
          <img src="images/bank-removebg.png" alt="">
           <p>ABC Bank Ltd</p>
        </div>
        <div class="rep-address">
            <p>123 Main Street</p>
            <p>City, State, Zip</p>
            <p>Phone: 123-456-7890</p>
        </div>
    </div>

    <div class="customer-info">
       <p>Transaction Receipt</p>
    </div>
    
    <div class="customer-details">
        <div class="customer-text">
            <p>Customer Name: <span><?php echo $customer['c_name']; ?></span></p>
            <p>Account Number: <span><?php echo $customer['acc_number']; ?></span></p>
        </div>
    <div class="total">
        <p>Current Balance: <?php echo $transaction['account_balance']; ?></p>
    </div>
    </div>

   <div>
   <table class="transaction-table">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Balance</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $transactionResult->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['t_id']; ?></td>
                <td><?php echo $row['transaction_type']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['account_balance']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

   </div>
    <div class="footer">
        <p>Thank you for banking with ABC Bank LTD</p>
        <p><em>This is a system-generated receipt</em></p>
        <button onclick="window.print()">Print Receipt</button>
    </div>
</div>

</body>
</html>
