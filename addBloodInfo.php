<?php

// Page Title
$pageTitle = "Add Blood Info | Blood Bank";

// Header
include_once "header.php";

// If Not Logged In
if (!isset($_SESSION['id'])) {
    header("location: login.php");
}
?>

<!-- Container for Left & Right Margins -->
<div class="container">
    <?php
    // If Receiver
    if ($_SESSION['userType'] == "receivers") {
    ?>
        <p class="lead mt-3 text-center">Receivers are not authorised to add Blood Info.</p>
        <?php
    } else {
        // Check Form Data by Hospitals
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            require_once "config.php";

            $bloodGroup = $_POST["bloodGroup"];
            $bloodType = $_POST["bloodType"];
            $hospitalName = $_SESSION["name"];

            $sql = "INSERT INTO blood_info (blood_group, blood_type, hospital_name) VALUES ('$bloodGroup', '$bloodType', '$hospitalName')";

            if ($stmt = mysqli_prepare($con, $sql)) {

                if (mysqli_stmt_execute($stmt)) {
        ?>
                    <p class="lead text-center text-success mt-2">Added</p>
        <?php
                } else {
                    echo "Something went wrong. Please try again.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }

            // Close connection
            mysqli_close($con);
        }
        ?>

        <!-- Form to Add Blood Info -->
        <div class="container display-4 text-center mt-3">Add Blood Info</div>
        <p class="lead mt-2 text-center"><?php echo $_SESSION['name']; ?></p>
        <form action="addBloodInfo.php" method="POST">
            <!-- Blood Group A, B, AB, O -->
            <div class="mb-3">
                <label for="bloodgrpup" class="form-label">Blood Group</label>
                <input type="text" class="form-control" name="bloodGroup" required>
            </div>
            <!-- Blood Type + & - -->
            <div class="mb-3">
                <label for="bloodType" class="form-label">Blood Type</label>
                <input type="text" class="form-control" name="bloodType" required>
            </div>
            <!-- Buttons for Submit & Reset -->
            <button type="submit" class="btn btn-danger" value="added">Add</button>
            <button type="reset" class="btn btn-primary" value="reset">Reset</button>
        </form>
    <?php
    }

    // Footer
    require "footer.php";
    ?>

</div>