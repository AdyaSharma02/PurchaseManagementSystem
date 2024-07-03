<!DOCTYPE html>
<html>
<head>
  <title>insertPurchaseOrder: Purchase Management System</title>
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

    h2 {
         text-transform: uppercase;
         text-align: center;
         margin-bottom: 20px;
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

    .form-container {
      margin-top: 30px;
      margin-bottom: 30px;
    }

    .form-container button[type="submit"] {
      margin-top: 15px;
    }

    label
    {
      font-weight: bold;
    }

    .footer {
      background-color: #f8f9fa;
      padding: 20px 0;
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
        <a href="http://localhost/Project/CompanyInfo.html">Company Details</a>
      </li>
      <li class="nav-item info">
        <i class="fas fa-user icon"></i>
        <a href="http://localhost/Project/AccountDetails.php">Account Details</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="form-container">
      <h2 class="text-center"><b>New Purchase Order</b></h2>
      <form action="http://localhost/Project/newPurchase.php" method="POST">
        <div class="form-group row">
          <label for="poid" class="col-sm-3 col-form-label">POID:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="poid" name="poid" required>
          </div>
        </div>        
        <div class="form-group row">
          <label for="supplierName" class="col-sm-3 col-form-label">Supplier Name:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="supplierName" name="supplierName" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="poDate" class="col-sm-3 col-form-label">PO Date:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="poDate" name="poDate" placeholder="YYYY-MM-DD" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="deliveryDate" class="col-sm-3 col-form-label">Delivery Date:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="deliveryDate" name="deliveryDate" placeholder="YYYY-MM-DD" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-sm-3 col-form-label">Status:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="status" name="status" value="Pending" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="shippingAddress" class="col-sm-3 col-form-label">Shipping Address:</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="shippingAddress" name="shippingAddress" required></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="billingAddress" class="col-sm-3 col-form-label">Billing Address:</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="billingAddress" name="billingAddress" required></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="contactPerson" class="col-sm-3 col-form-label">Contact Person:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="contactPerson" name="contactPerson" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="itemId" class="col-sm-3 col-form-label">Item ID:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="itemId" name="itemId" required>
          </div>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
      </form>
    </div>
  </div>

  <footer class="footer mt-auto py-3">
    <div class="container text-center">
      <p>&copy; 2023 Purchase Management System. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>








