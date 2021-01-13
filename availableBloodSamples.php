<?php

// Page Title
$pageTitle = "Available Blood Samples | Blood Bank";

// Header
include_once "header.php";
?>

<!-- Container for Left & Right Margins -->
<div class="container">
    <h1 class="display-6 d-flex justify-content-center mt-4">Available Blood Samples</h1>
    <?php

    // Database Configuration File
    require_once "config.php";

    // SQL Query
    $query = "SELECT * FROM blood_info";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = 0;

    ?>
        <!-- Table to Display Data -->
        <table class="table mt-4 text-center">
            <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Blood Type</th>
                    <th scope="col">Hospital</th>
                    <th scope="col">Request Sample</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // output Data of Each Row
                while ($data = mysqli_fetch_assoc($result)) {
                    $row++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $row ?></th>
                        <td><?php echo $data["blood_group"]; ?></td>
                        <td><?php echo $data["blood_type"]; ?></td>
                        <td><?php echo $data["hospital_name"]; ?></td>
                        <td>
                            <?php
                            if (!isset($_SESSION['id'])) {
                            ?>
                                <button class="btn btn-outline-danger mx-auto" type="submit" onclick="location.href = 'login.php';">Request Sample</button>
                            <?php
                            } else if ($_SESSION['userType'] == "hospitals") {
                            ?>
                                <button class="btn btn-outline-danger mx-auto" type="submit" onclick="alert('Hospitals can place request.');">Request Sample</button>
                            <?php
                            } else if ($_SESSION['userType'] == "receivers") {
                            ?><a href="availableBloodSamples.php?bloodId=<?php echo $data["id"]; ?>">
                                    <button class="btn btn-outline-danger mx-auto" id="<?php echo $data["id"]; ?>" type="submit">Request Sample</button>
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                if (isset($_GET['bloodId'])) {
                    $name =  $_SESSION['name'];
                    $bloodId = $_GET['bloodId'];
                    $query = "INSERT INTO requests (name, blood_info_id) VALUES ('$name', '$bloodId')";
                    if (mysqli_query($con, $query)) {
                    ?>
                        <p class="container text-center mt-2 text-success">Request placed.</p>

                    <?php
                    } else {
                    ?>
                        <p class="container text-center mt-2 text-success">Request not placed!!!</p>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
    ?>
        <p class="container lead mt-3 text-center">Blood samples not found.</p>
    <?php
    }
    // Closing Connection
    mysqli_close($con);
    ?>
</div>

<?php
// Footer
require "footer.php";
?>