<!DOCTYPE html>
<html>
<head>
  <title>Edit Purchase Order: Purchase Management System</title>
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

    .container {
      margin-top: 40px;
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
    h2 {
         text-transform: uppercase;
         text-align: center;
         margin-bottom: 20px;
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

  <?php
  // Check if the POID parameter is set
  if (isset($_GET['id'])) {
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

    // Get the POID from the URL parameter
    $poid = $_GET['id'];

    // Retrieve the purchase order details from the database
    $sql = "SELECT * FROM new_purchase_order WHERE POID = '$poid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
  ?>

  <div class="container">
    <h2><b>Edit Purchase Order</h2>
    <form action="updatePurchaseOrder.php" method="post">
      <input type="hidden" name="poid" value="<?php echo $row['POID']; ?>">
      <div class="form-group">
        <label for="supplierName">Supplier Name:</label>
        <input type="text" class="form-control" id="supplierName" name="supplierName" value="<?php echo $row['SupplierName']; ?>" required>
      </div>
      <div class="form-group">
        <label for="poDate">PO Date:</label>
        <input class="form-control" id="poDate" name="poDate" placeholder=YYYY-MM-DD value="<?php echo $row['PODate']; ?>" required>
      </div>
      <div class="form-group">
        <label for="deliveryDate">Delivery Date:</label>
        <input class="form-control" id="deliveryDate" name="deliveryDate" placeholder=YYYY-MM-DD value="<?php echo $row['DeliveryDate']; ?>" required>
      </div>
      <div class="form-group">
        <label for="status">Status:</label>
        <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['Status']; ?>" required>
      </div>
      <div class="form-group">
        <label for="shippingAddress">Shipping Address:</label>
        <input type="text" class="form-control" id="shippingAddress" name="shippingAddress" value="<?php echo $row['ShippingAddress']; ?>" required>
      </div>
      <div class="form-group">
        <label for="billingAddress">Billing Address:</label>
        <input type="text" class="form-control" id="billingAddress" name="billingAddress" value="<?php echo $row['BillingAddress']; ?>" required>
      </div>
      <div class="form-group">
        <label for="contactPerson">Contact Person:</label>
        <input type="text" class="form-control" id="contactPerson" name="contactPerson" value="<?php echo $row['ContactPerson']; ?>" required>
      </div>
      <div class="form-group">
        <label for="itemId">Item ID:</label>
        <input type="text" class="form-control" id="itemId" name="itemId" value="<?php echo $row['ItemID']; ?>" required>
      </div>
      </b>
      <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
  </div>

  <?php
    } else {
      echo "No purchase order found with the given ID.";
    }

    $conn->close();
  } else {
    echo "No POID parameter provided.";
  }
  ?>

  <footer class="footer">
    <p>&copy; 2023 Purchase Management System. All rights reserved.</p>
  </footer>
</body>
</html>
