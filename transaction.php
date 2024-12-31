<?php
require_once("connect.php");

$acc_number = $_POST['acc_number'];
$amount = $_POST['amount'];
$transaction_type = $_POST['transaction_type'];

// Fetch Customer by Account Number
$sql = "SELECT * FROM tb_customer_login WHERE acc_number = '$acc_number'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $customer = $result->fetch_assoc();
    $c_id = $customer['c_id'];

    // Get current balance
    $balanceQuery = "SELECT account_balance FROM transactions WHERE c_id = '$c_id' ORDER BY t_id DESC LIMIT 1";
    $balanceResult = $con->query($balanceQuery);
    $currentBalance = ($balanceResult->num_rows > 0) ? $balanceResult->fetch_assoc()['account_balance'] : 0;

    // Calculate new balance
    if ($transaction_type == 'Deposit') {
        $newBalance = $currentBalance + $amount;
    } elseif ($transaction_type == 'Withdraw' ) {
        if ($amount > $currentBalance) {
            echo"
            <script>
            alert('Insufficient amount for withdrawal.');
            window.location.href='userpannel.php';
            </script>
            ";
            exit();
        }else{
            $newBalance = $currentBalance - $amount;
        }
    } else {
        echo"
        <script>
        alert('Please enter transaction type.');
        window.location.href='userpannel.php';
        </script>
        ";
    }
    // Insert transaction
    $insertQuery = "INSERT INTO transactions (c_id, amount, transaction_type, account_balance)
                    VALUES ('$c_id', '$amount', '$transaction_type', '$newBalance')";

    if ($con->query($insertQuery) === TRUE) {
        echo"
        <script>
        alert('$transaction_type'+' successfully completed.');
        window.location.href='userpannel.php';
        </script>
        ";
    } else {
        echo"
        <script>
        alert('Failed to <?php echo $transaction_type; ?>. Please try again.');
        window.location.href='userpannel.php';
        </script>
        ";
    }

} else {
    echo "Account not found!";
}
?>