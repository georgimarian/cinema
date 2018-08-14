<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
            background-image: url("https://www.verdict.co.uk/wp-content/uploads/2017/10/shutterstock_384996514.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100%;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
<div class="page-header">
    <h1 style="color:red;">Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our movie
        booking site.</h1>
</div>
<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>