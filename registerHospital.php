<?php

// Page Title
$pageTitle = "Register Hospital | Blood Bank";

// Header
require_once "header.php";

// If Logged In
if (isset($_SESSION['id'])){
    header("location: dashboard.php");
}

// Check Form Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Configuration File for Database Connection
    require_once "config.php";

    $hospitalName = $_POST["hospitalName"];
    $hospitalEmail = $_POST["hospitalEmail"];
    $hospitalPassword = $_POST["hospitalPassword"];
    $hospitalCity = $_POST["hospitalCity"];

    // SQL Query
    $sql = "INSERT INTO hospitals (name, email, password, city) VALUES ('$hospitalName', '$hospitalEmail', '$hospitalPassword', '$hospitalCity')";

    if ($stmt = mysqli_prepare($con, $sql)) {

        if (mysqli_stmt_execute($stmt)) {
            // Redirect to Login Page
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
    <h1 class="display-6 d-flex justify-content-center mt-4">Register - Hospital</h1>
    <form action="registerHospital.php" method="POST">
        <!-- Hospital Name -->
        <div class="mb-3">
            <label for="hospitalName" class="form-label">Hospital Name</label>
            <input type="text" class="form-control" name="hospitalName" required>
        </div>
        <!-- Hospital Email -->
        <div class="mb-3">
            <label for="hospitalEmail" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="hospitalEmail" required>
        </div>
        <!-- Hospital Password -->
        <div class="mb-3">
            <label for="hospitalPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="hospitalPassword" required>
        </div>
        <!-- Hospital City -->
        <div class="mb-3">
            <label for="hospitalCity" class="form-label">City</label>
            <input type="text" class="form-control" name="hospitalCity" required>
        </div>
        <!-- Submit & Reset Button -->
        <button type="submit" class="btn btn-danger" value="register">Register</button>
        <button type="reset" class="btn btn-primary" value="reset">Reset</button>
    </form>
</div>

<?php
// Footer
require "footer.php";
?>