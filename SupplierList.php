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

$sql = "SELECT * FROM supplier_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <div class="container">
    <table class="table table-striped table-bordered table-responsive table-hover table-white">
      <thead>
        <tr>
          <th>SupplierID</th>
          <th>SupplierName</th>
          <th>ContactPersonName</th>
          <th>ContactEmail</th>
          <th>ContactPhoneNumber</th>
          <th>Address</th>
          <th>Status</th>
          <th colspan=2>Actions</th>
        </tr>
      </thead>
      <tbody>';
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["SupplierID"] . "</td>";
    echo "<td>" . $row["SupplierName"] . "</td>";
    echo "<td>" . $row["ContactPersonName"] . "</td>";
    echo "<td>" . $row["ContactEmail"] . "</td>";
    echo "<td>" . $row["ContactPhoneNumber"] . "</td>";
    echo "<td>" . $row["Address"] . "</td>";
    echo "<td>" . $row["Status"] . "</td>";
    echo '<td class="action-buttons">
        <a class="edit-button btn btn-success" href="http://localhost/Project/editSupplierList.php?id=' . $row["SupplierID"] . '">Edit</a>
      </td>
      <td class="action-buttons">
        <a class="delete-button btn btn-danger" href="http://localhost/Project/deleteSupplierList.php?id=' . $row["SupplierID"] . '">Delete</a>
      </td>';
      echo "</tr>";
  }
  echo '
      </tbody>
    </table>
  </div>
  ';
} else {
  echo "0 results";
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>SupplierList: Purchase Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body 
        {
            margin-top: 40px;
            padding-top: 70px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
        
        .navbar-nav .nav-item.info .icon 
        {
            color: white;
        }
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
    <footer class="footer">
            <p>&copy; 2023 Purchase Management System. All rights reserved.</p>
    </footer>
</body>
</html>
