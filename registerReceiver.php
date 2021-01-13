<?php

// Page Title
$pageTitle = "Register Receiver | Blood Bank";

// Header
require_once "header.php";

// If Logged In
if (isset($_SESSION['id'])){
    header("location: dashboard.php");
}

// Check Form Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database Configuration File
    require_once "config.php";

    $receiverName = $_POST["receiverName"];
    $receiverEmail = $_POST["receiverEmail"];
    $receiverPassword = $_POST["receiverPassword"];
    $receiverBloodGroup = $_POST["receiverBloodGroup"];

    // SQL Query
    $sql = "INSERT INTO receivers (name, email, password, blood_group) VALUES ('$receiverName', '$receiverEmail', '$receiverPassword', '$receiverBloodGroup')";

    if ($stmt = mysqli_prepare($con, $sql)) {

        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            header("location: login.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($con);
}
?>

<!-- Container for Left & Right Margins -->
<div class="container">
    <h1 class="display-6 d-flex justify-content-center mt-4">Register - Receiver</h1>
    <form action="registerReceiver.php" method="POST">
        <!-- Receiver Name -->
        <div class="mb-3">
            <label for="receiverName" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="receiverName" required>
        </div>
        <!-- Receiver Email -->
        <div class="mb-3">
            <label for="receiverEmail" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="receiverEmail" required>
        </div>
        <!-- Receiver Password -->
        <div class="mb-3">
            <label for="receiverPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="receiverPassword" required>
        </div>
        <!-- Receiver Blood Group -->
        <div class="mb-3">
            <label for="receiverBloodGroup" class="form-label">Blood Group</label>
            <input type="text" class="form-control" name="receiverBloodGroup" required>
        </div>
        <!-- Submit & Reset Buttons -->
        <button type="submit" class="btn btn-danger">Register</button>
        <button type="reset" class="btn btn-primary" value="reset">Reset</button>
    </form>
</div>

<?php
// Footer
require "footer.php";
?>