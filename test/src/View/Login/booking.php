<?php

//require_once 'db.php';
//
//$date = $time = $hall = "";
//$date_err = $time_err = $hall_err = "";
//
//// Processing form data when form is submitted
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//    // Validate username
//    if (empty(trim($_POST["hall"]))) {
//        $username_err = "Please enter a hall.";
//    } else {
//        // Prepare a select statement
//        $sql = "SELECT id FROM schedule WHERE hall_fk = :hall_fk";
//
//        if ($stmt = $pdo->prepare($sql)) {
//            // Bind variables to the prepared statement as parameters
//            $stmt->bindParam(':hall_fk', $param_hall, PDO::PARAM_STR);
//
//            // Set parameters
//            $param_hall = trim($_POST["hall"]);
//
//            // Attempt to execute the prepared statement
//            if ($stmt->execute()) {
//                if ($stmt->rowCount() == 1) {
//                    $username_err = "This hall is already taken.";
//                } else {
//                    $username = trim($_POST["username"]);
//                }
//            } else {
//                echo "Oops! Something went wrong. Please try again later.";
//            }
//        }
//
//        // Close statement
//        unset($stmt);
//    }
//
//    // Validate email
//    if (empty(trim($_POST["email"]))) {
//        $email_err = "Please enter an email.";
//    } else {
//        // Prepare a select statement
//        $sql = "SELECT pk FROM user WHERE email = :email";
//
//        if ($stmt = $pdo->prepare($sql)) {
//            // Bind variables to the prepared statement as parameters
//            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
//
//            // Set parameters
//            $param_email = trim($_POST["email"]);
//
//            // Attempt to execute the prepared statement
//            if ($stmt->execute()) {
//                if ($stmt->rowCount() == 1) {
//                    $email_err = "This email is already taken.";
//                } else {
//                    $email = trim($_POST["email"]);
//                }
//            } else {
//                echo "Oops! Something went wrong. Please try again later.";
//            }
//        }
//
//        // Close statement
//        unset($stmt);
//    }
//
//    // Validate password
//    if (empty(trim($_POST['date']))) {
//        $hall_err = "Please enter a date.";
//    }  else {
//        $hall = trim($_POST['date']);
//    }
//
//
//    // Check input errors before inserting in database
//    if (empty($date_err) && empty($time_err) && empty($hall_err)) {
//
//        // Prepare an insert statement
//        $sql = "INSERT INTO booking (`date`, `time_fk`, `hall_fk`) VALUES (:date, :time, :hall)";
//
//        if ($stmt = $pdo->prepare($sql)) {
//            // Bind variables to the prepared statement as parameters
//            $stmt->bindParam(':date', $param_date, PDO::PARAM_STR);
//            $stmt->bindParam(':time', $param_time, PDO::PARAM_STR);
//            $stmt->bindParam(':hall', $param_hall, PDO::PARAM_STR);
//
//
//            // Set parameters
//            $param_date = $date;
//            $param_time = $time;
//            $param_hall = $hall;
//
//
//            // Attempt to execute the prepared statement
//            if ($stmt->execute()) {
//                // Redirect to login page
//                header("location: login.php");
//            } else {
//                echo "Something went wrong. Please try again later.";
//            }
//        }
//
//        // Close statement
//        unset($stmt);
//    }
//
//    // Close connection
//    unset($pdo);
//}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book</title>
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

        form {
            color: #ffb3b3;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #ffb3b3;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        h1 {
            color: #b30000;
        }

        btn {

        }

        .btn-primary {
            background-color: #b30000;
        }

        .btn-primary:hover {
            background-color: red;
        }
    </style>
</head>
<body>
<div class="topnav">
    <ul>
        <li><a href="/src/View/Login/homepage.phtml">Homepage</a></li>
        <li><a href="/src/View/Login/login.php">Schedule</a></li>
        <li><a href="/src/View/Login/login.php">Log In</a></li>
    </ul>
</div>
<div class="menu">
    <div class="page-header">
        <h1>Please select your booking details for the movie <?php ?></h1>
    </div>
</div>
<div>
    <form class="form-inline">
        <div>
            Date:
            <input type="date" name="bookdate">
        </div>
        <div>
            Time:
            <select name="time">
                <option value="19:00">19:00</option>
                <option value="21:20">21:20</option>
            </select>
        </div>
        <div>
            Hall:
            <select name="hall">
                <option value="iulius cluj 1">Iulius Cluj 1</option>
                <option value="victoria">Victoria</option>
                <option value="arta">Arta</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>