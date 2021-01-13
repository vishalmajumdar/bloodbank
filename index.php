<?php

// Page Title
$pageTitle = "Blood Bank | Donate & Request";

// Header
require_once "header.php";
?>

<!-- Contaier for Left & Right margins -->
<div class="container">

  <!-- Bootstrap Classes Added -->
  <h1 class="display-6 d-flex justify-content-center mt-4">Welcome to Blood Bank</h1>
  <p class="lead d-flex justify-content-center mt-2">Below are the options available for different types of users.</p>
  <ul>
    <!-- Hospitals Options -->
    <li>
      <h3>Hospitals</h3>
    </li>
    <ul>
      <li>Register</li>
      <li>Login</li>
      <li>Add Blood Sample</li>
      <li>Add Blood Types</li>
      <li>View Requests</li>
    </ul>
    </li>
    <!-- Receivers Options -->
    <li>
      <h3>Receivers</h3>
    </li>
    <ul>
      <li>Register</li>
      <li>Login</li>
      <li>View Blood Samples</li>
      <li>Request Blood Sample</li>
    </ul>
    </li>
    <!-- Guests Options -->
    <li>
      <h3>Guests</h3>
    </li>
    <ul>
      <li>View Blood Samples</li>
    </ul>
    </li>
  </ul>
</div>

<?php
// Footer
require "footer.php";
?>