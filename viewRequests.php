<?php

// Page Title
$pageTitle = "View Requests | Blood Bank";

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
    // If User is a Receiver
    if ($_SESSION['userType'] == "receivers") {
    ?>
        <p class="lead mt-3 text-center">Receivers are not authorised to view requests.</p>
    <?php

    } else {
    ?>
        <div class="display-4 text-center mt-3">View Requests</div>
        <p class="lead mt-2 text-center"><?php echo $_SESSION['name']; ?></p>
        <?php

        require_once "config.php";
        $name = $_SESSION['name'];

        // SQL Query
        $query = "SELECT requests.name, blood_info.blood_group, blood_info.blood_type FROM requests LEFT JOIN blood_info ON requests.blood_info_id = blood_info.id WHERE blood_info.hospital_name = '$name'";

        $result = $con->query($query);
        $row = 0;

        if ($result->num_rows > 0) {

        ?>
            <table class="table mt-4 text-center">
                <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Receiver Name</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Blood Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // output data of each data
                    while ($data = $result->fetch_assoc()) {
                        $row++;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row ?></th>
                            <td><?php echo $data["name"]; ?></td>
                            <td><?php echo $data["blood_group"]; ?></td>
                            <td><?php echo $data["blood_type"]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <p class="lead mt-2 text-center">0 results</p>

    <?php
        }

        // Closing Database Connection
        $con->close();
    }

    // Footer
    require "footer.php";
    ?>
</div>