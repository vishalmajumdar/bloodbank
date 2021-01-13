<?php

// Page Title
$pageTitle = "Dashboard | Blood Bank";

// Header
include_once "header.php";

// If Not Logged In
if (!isset($_SESSION['userType'])) {
?>
    <div class="container">
        <div class="display-4 text-center mt-3">You are not logged in.</div>
    </div>
<?php
    die();
} else {
?>
    <!-- Logged In -->
    <div class="container display-4 text-center mt-3">Dashboard</div>
<?php
}
// If user is a Hospital
if ($_SESSION['userType'] == "hospitals") {
?>
    <div class="container lead mt-3">
        <p>Name - <?php echo $_SESSION['name'] ?></p>
        <p>City - <?php echo $_SESSION['city'] ?></p>
    </div>
    <div class="container">
        <a href="addBloodInfo.php">
            <button class="btn btn-outline-danger" type="submit">Add Blood Info</button>
        </a>
        <br>
        <a href="viewRequests.php">
            <button class="btn btn-outline-danger mt-3" type="submit">View Requests</button>
        </a>
    </div>

<?php
    // If User is a Receiver
} else if ($_SESSION['userType'] == "receivers") {
?>
    <div class="container lead mt-3">
        <p>Name - <?php echo $_SESSION['name'] ?></p>
        <p>Blood Group - <?php echo $_SESSION['bloodGroup'] ?></p>
    </div>
<?php
} else {
    echo "Not selected a valid user type";
}

// Footer
require "footer.php";
