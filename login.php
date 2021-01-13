<?php

// Page Title
$pageTitle = "Login | Blood Bank";

// Header
include_once "header.php";
if (isset($_SESSION['id'])) {
    header("location: dashboard.php");
}

// Check Form Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php";
    if ($_POST["userType"] == "none") {
?>
        <p class="container text-center mt-2" style="color: red;">Select a Valid User Type</p>
        <?php
    } else {
        $userType = $_POST["userType"];
        $loginEmail = $_POST['loginEmail'];
        $loginPassword = $_POST['loginPassword'];

        // SQL Query
        $query = "SELECT * FROM $userType WHERE email = '$loginEmail'";

        $result = mysqli_query($con, $query);
        $data  = mysqli_fetch_array($result);

        if (is_array($data)) {
            $_SESSION["id"] = $data['id'];
            $_SESSION["name"] = $data['name'];
            $_SESSION["userType"] = $_POST['userType'];
            if ($_POST['userType'] == "receivers") {
                $_SESSION["bloodGroup"] = $data['blood_group'];
            } else if ($_POST['userType'] == "hospitals") {
                $_SESSION["city"] = $data['city'];
            }
        } else {
        ?>
            <p class="container text-center mt-2" style="color: red;">Invalid credentials!!!</p>

<?php
        }

        if (isset($_SESSION["id"]))
            header("Location:dashboard.php");

        // Close connection
        mysqli_close($con);
    }
}

?>
<!-- Container for Left & Right Margin -->
<div class="container">
    <h1 class="display-6 d-flex justify-content-center mt-4">Login - Blood Bank</h1>
    <form action="login.php" method="POST">
        <div class="mb-3">
            <label for="userType" class="form-label">User Type</label>
            <select class="form-select" name="userType" required>
                <option selected value="none">---</option>
                <option value="hospitals">Hospital</option>
                <option value="receivers">Receiver</option>
            </select>
        </div>
        <div class="mb-3">
            <!-- Login Email -->
            <label for="loginEmail" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="loginEmail" required>
        </div>
        <div class="mb-3">
            <!-- Login Password -->
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="loginPassword" required>
        </div>
        <!-- Submit & Reset Buttons -->
        <button type="submit" class="btn btn-danger">Login</button>
        <button type="reset" class="btn btn-primary" value="reset">Reset</button>
    </form>
</div>

<?php
// Footer
require "footer.php";
?>