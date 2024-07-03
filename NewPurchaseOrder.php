<!DOCTYPE html>
<html>
<head>
  <title>NewPurchaseOrder: Purchase Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      padding-top: 70px;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    
    .navbar {
      background-color: #007bff;
      text-transform: uppercase;
    }
    
    .navbar-brand,
    .navbar-nav .nav-link {
      color: #fff;
    }
    
    .navbar-brand {
      font-weight: bold;
    }
    
    .nav-link:hover {
      color: #fff;
    }
    
    .nav-item.active .nav-link {
      font-weight: bold;
    }
    
    a {
      color: white;
    }
    
    a:hover,
    a:active,
    a:visited {
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

    .container {
      margin-top: 40px;
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

$sql = "SELECT * FROM new_purchase_order";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
  <div class="table table-striped table-bordered table-responsive table-hover table-white">
    <table class="table">
      <thead>
        <tr>
          <th>POID</th>
          <th>SupplierName</th>
          <th>PODate</th>
          <th>DeliveryDate</th>
          <th>Status</th>
          <th>ShippingAddress</th>
          <th>BillingAddress</th>
          <th>ContactPerson</th>
          <th>ItemID</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["POID"] . "</td>";
          echo "<td>" . $row["SupplierName"] . "</td>";
          echo "<td>" . $row["PODate"] . "</td>";
          echo "<td>" . $row["DeliveryDate"] . "</td>";
          echo "<td>" . $row["Status"] . "</td>";
          echo "<td>" . $row["ShippingAddress"] . "</td>";
          echo "<td>" . $row["BillingAddress"] . "</td>";
          echo "<td>" . $row["ContactPerson"] . "</td>";
          echo "<td>" . $row["ItemID"] . "</td>";
          echo '<td class="action-buttons">
            <a class="edit-button btn btn-success" href="http://localhost/Project/editPurchaseOrder.php?id=' . $row["POID"] . '">Edit</a>
          </td>
          <td class="action-buttons">
            <a class="delete-button btn btn-danger" href="http://localhost/Project/deletePurchaseOrder.php?id=' . $row["POID"] . '">Delete</a>
          </td>';
          echo "</tr>";
        }
        ?>

      </tbody>
    </table>
</div>
<div class="action-buttons" style="text-align: center; margin-bottom: 10px;">
    <a class="edit-button btn btn-success" href="http://localhost/Project/insertPurchase.php">
        <span style="font-size: 20px;">🚀</span> Launch a New Adventure (Purchase Order)
    </a>
  </div>
</div>
<?php
} else {
  echo "0 results";
}
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