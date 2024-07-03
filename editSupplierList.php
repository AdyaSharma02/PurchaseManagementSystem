<!DOCTYPE html>
<html>
<head>
   <title>editSupplierList: Purchase Management System</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <style type="text/css">
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

      .navbar-nav .nav-item.info .icon {
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

      .container {
         margin-top: 40px;
      }

      .form-group label {
         font-weight: bold;
      }

      .form-control {
         border-radius: 0;
      }

      button[type="submit"] {
         border-radius: 0;
      }

      @media (max-width: 576px) {
         body {
            padding-top: 56px;
         }
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
   <div class="container">
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

      if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
         $id = $_GET['id'];
         $sql = "SELECT * FROM supplier_list WHERE SupplierID = $id";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
      ?>
            <div class="container">
               <h2><b>Edit Supplier</b></h2>
               <form action="updateSupplier.php" method="POST">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="supplierName">Supplier Name:</label>
                           <input type="text" class="form-control" id="supplierName" name="supplierName" value="<?= $row["SupplierName"] ?>">
                        </div>
                        <div class="form-group">
                           <label for="contactEmail">Contact Email:</label>
                           <input type="email" class="form-control" id="contactEmail" name="contactEmail" value="<?= $row["ContactEmail"] ?>">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="contactPersonName">Contact Person Name:</label>
                           <input type="text" class="form-control" id="contactPersonName" name="contactPersonName" value="<?= $row["ContactPersonName"] ?>">
                        </div>
                        <div class="form-group">
                           <label for="contactPhoneNumber">Contact Phone Number:</label>
                           <input type="text" class="form-control" id="contactPhoneNumber" name="contactPhoneNumber" value="<?= $row["ContactPhoneNumber"] ?>">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="address">Address:</label>
                     <textarea class="form-control" id="address" name="address"><?= $row["Address"] ?></textarea>
                  </div>
                  <input type="hidden" name="supplierID" value="<?= $id ?>">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
               </form>
            </div>
         <?php
         } else {
            echo "Supplier not found.";
         }
      } else {
         echo "Invalid request.";
      }

      $conn->close();
      ?>
   </div>
   <footer class="footer">
      <p>&copy; 2023 Purchase Management System. All rights reserved.</p>
   </footer>
</body>
</html>
