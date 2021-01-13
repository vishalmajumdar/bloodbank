<?php
// Session For Users
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="description" content="Blood Bank Web Application">
  <meta name="keywords" content="Vishal Majumdar, Blood Bank, Internshala">
  <meta name="author" content="Vishal Majumdar">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Dynamic Link -->
  <title><?php echo $pageTitle; ?></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Container for margin on the left  and right -->
  <div class="container">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <button class="btn btn-outline-danger" type="submit">Blood Bank</button>
        </a>

        <!-- Mobile Navigation -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="availableBloodSamples.php">
                <button class="btn btn-outline-danger" type="submit">Available Blood Samples</button>
              </a>
            </li>
            <?php
            // Condition For Users
            if (!isset($_SESSION['userType'])) {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <button class="btn btn-outline-danger" type="submit">Register</button>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="registerHospital.php">Hospital</a></li>
                  <li>
                    <div class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="registerReceiver.php">Receiver</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="login.php" class="nav-link">
                  <button class="btn btn-outline-danger" type="submit">Login</button>
                </a>
              </li>
            <?php
            } else {
            ?>
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                  <button class="btn btn-outline-danger" type="submit">Dashboard</button>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <button class="btn btn-outline-danger" type="submit">Logout</button>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>