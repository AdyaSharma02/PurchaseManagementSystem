<!DOCTYPE html>
<html>
<head>
  <title>UserList: Purchase Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>

     body 
        {
            padding-top: 70px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container
        {
          margin-top: 40px;
        }

        .navbar 
        {
            background-color: #007bff;
            text-transform: uppercase;
        }

        .navbar-brand,
        .navbar-nav .nav-link
       {
            color: #fff;
        }

        .navbar-brand 
        {
            font-weight: bold;
        }

        .nav-link:hover 
        {
            color: #fff;
        }

        .nav-item.active .nav-link 
        {
            font-weight: bold;
        }
        
        a 
        {
            color: white;
        }

        a:hover,
        a:active,
        a:visited 
        {
            color: white;
        }
        
        .navbar-nav .nav-item.info a {
          color: white;
        }

      .icon {
        margin-right: 5px;
        color: white;
      }
      .navbar-nav .nav-item.info {
            margin-left: 15px;
        }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <a class="navbar-brand" href="#">
    <i class="fas fa-shopping-cart"></i>
    Purchase Management System
  </a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item info">
      <i class="fas fa-home icon"></i>
      <a href="http://localhost/Project/Index.html">Home</a>
    </li>
    <li class="nav-item info">
      <i class="fas fa-building icon"></i>
      <a href="http://localhost/Project/ComapanyInfo.html">Company Details</a>
    </li>
    <li class="nav-item info">
        <i class="fas fa-user icon"></i>
        <a href="http://localhost/Project/AccountDetails.php">Account Details</a>
      </li>
  </ul>
</nav>
</body>
</html>
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

$sql = "SELECT * FROM user_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <div class="container">
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>FullName</th>
            <th>Address</th>
            <th>PhoneNumber</th>
            <th>CreatedDate</th>
          </tr>
        </thead>
        <tbody>';
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["ID"] ."</td>";
    echo "<td>" . $row["Username"] . "</td>";
    echo "<td>" . $row["Email"] . "</td>";
    echo "<td>" . $row["FullName"] . "</td>";
    echo "<td>" . $row["Address"] . "</td>";
    echo "<td>" . $row["PhoneNumber"] . "</td>";
    echo "<td>" . $row["CreatedDate"] . "</td>";

    echo "</tr>";
  }
  echo '
        </tbody>
      </table>
    </div>
  </div>
  ';
} else {
  echo "0 results";
}
$conn->close();
?>

<html>
<head>
<style type="text/css">
.footer 
{
  background-color: #f8f9fa;
  padding: 20px 0;
  text-align: center;
  margin-top: auto;
}
.footer p 
{
  margin-bottom: 0;
}
</style>
</head>
<body>
<footer class="footer">
    <p>&copy; 2023 Purchase Management System. All rights reserved.</p>
</footer>
</body>
</html>
