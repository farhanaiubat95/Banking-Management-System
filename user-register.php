<?php
session_start();
?>

<?php
    require('./assets/header.php');
?>
    <section class="head-h1">
        <h1 class="fw-bold display-6 mb-3">Registration Form</h1>
    </section>
    <form class="register-form" action="insertUser.php" method="POST"  enctype="multipart/form-data" >
        <div class="form-row">
            <div class="form-group">
                <label for="customerName">Customer's Name:</label>
                <input type="text" id="customerName" name="c_name" required>
            </div>
            <div class="form-group">
                <label for="accountNumber">Account Number:</label>
                <input type="number" id="accountNumber" name="acc_number" required>
            </div>
            <div class="form-group">
                <label for="fatherName">Father's Name:</label>
                <input type="text" id="fatherName" name="f_name" required>
            </div>
            <div class="form-group">
                <label for="motherName">Mother's Name:</label>
                <input type="text" id="motherName" name="m_name" required>
            </div>
            <div class="form-group">
                <label for="customerEmail">Customer's Email:</label>
                <input type="email" id="customerEmail" name="c_email" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="number" id="contact" name="contact">
            </div>
            <div class="form-group">
                <label for="nidNo">NID No:</label>
                <input type="number" id="nidNo" name="nid_no" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>
        <input class="reg-log-btn" type="submit" name="submit" value="Submit">
    </form>

    
<?php
  require('./assets/footer.php');
?>
