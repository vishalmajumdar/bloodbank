<?php
// Session Start
session_start();

// Destroying Sessions
unset($_SESSION["id"]);
unset($_SESSION["userType"]);

session_destroy();

// Redirect to Login Page
header("Location:login.php");
