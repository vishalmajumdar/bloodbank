<?php
// Database Credentials.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bloodbank');

/* Attempt to Connect to MySQL Database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check Connection
if ($con === false) {
?>
    <p class="lead mt-2 text-center"> Database Connection Failed - <?php echo mysqli_connect_error(); ?></p>
<?php
    // Footer
    require "footer.php";
    die();
}
