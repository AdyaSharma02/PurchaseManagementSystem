<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullName = $_POST["fullName"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $createdDate = date("Y-m-d"); // Current date

    // Insert data into the login_logout table
    $insertLoginQuery = "INSERT INTO login_logout (username, password) VALUES ('$username', '$password')";
    $conn->query($insertLoginQuery);

    // Insert data into the user_list table
    $insertUserQuery = "INSERT INTO user_list (ID, Username, Email, FullName, Address, PhoneNumber, CreatedDate) 
                        VALUES ('$id', '$username', '$email', '$fullName', '$address', '$phone', '$createdDate')";
    $conn->query($insertUserQuery);

    // Redirect to the login form page after successful registration
    header("location: http://localhost:80/Project/Index.html");
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: url("img4.jpg");
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        label {
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
        }

        .form-control {
            border: none;
            border-radius: 0;
            background: transparent;
            color: #333;
            border-bottom: 2px solid #007bff;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        button[type="submit"],
        button[type="reset"] {
            border-radius: 0;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-reset {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-reset:hover {
            background-color: #c82333;
        }

        .icon-bar {
            position: fixed;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .icon-bar a {
            display: block;
            text-align: center;
            padding: 16px;
            transition: all 0.3s ease;
            color: white;
            font-size: 2rem;
            text-decoration: none;
        }

        .icon-bar a:hover {
            background-color: #000;
            transform: scale(1.1);
        }

        .facebook {
            background: #3B5998;
        }

        .instagram {
            background: linear-gradient(135deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
        }

        .google {
            background: #dd4b39;
        }

        .youtube {
            background: #bb0000;
        }
    </style>
</head>
<body>
<div class="icon-bar">
    <a href="http://www.facebook.com" class="facebook"><i class="fab fa-facebook"></i></a> 
    <a href="http://www.instagram.com" class="instagram"><i class="fab fa-instagram"></i></a> 
    <a href="http://www.google.com" class="google"><i class="fab fa-google"></i></a> 
    <a href="http://www.youtube.com" class="youtube"><i class="fab fa-youtube"></i></a> 
</div>
<div class="container mt-5">        
    <h2><b>COMPANY USER REGISTRATION</b></h2>
    <form action="signin.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id">Employee ID:</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control" name="fullName" id="fullName" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" class="form-control" name="phone" id="phone" required>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">REGISTER</button>
            <button class="btn btn-reset" type="reset"><i class="fas fa-sync-alt"></i> RESET</button>
        </div>
    </form>
</div>
</body>
</html>