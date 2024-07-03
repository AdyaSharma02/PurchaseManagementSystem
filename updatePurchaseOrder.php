<!DOCTYPE html>
<html>
<head>
    <title>Delete Purchase Order</title>
    <style>
       body {
            background: linear-gradient(to bottom, #007bff, #f0f6ff);
            background-attachment: fixed;
        }

        .container1 {
            text-align: center;
            margin-top: 2px;
            margin-left: 32%;
            width: 500px;
            border: 5px solid transparent;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            background-color: #fff;
            animation: blueBorderAnimation 2s infinite alternate;
        }

        @keyframes blueBorderAnimation {
            from {
                border-color: #007bff;
            }
            to {
                border-color: #0056b3;
            }
        }

        .photo {
            width: 500px;
            height: 390px;
            background-image: url("img2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            text-align: center;
            margin-top: 10px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .error-message {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .container1 {
                margin-left: 10px;
                margin-right: 10px;
                width: auto;
            }

            .photo {
                width: 100%;
                height: 300px;
            }
        }
        
    </style>
</head>
<body>
<div class="container1">
 <div class="photo"></div>
<h2>UPDATE PURCHASE ORDER</h2>
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

  // Get the values from the form
  $poid = $_POST['poid'];
  $supplierName = $_POST['supplierName'];
  $poDate = $_POST['poDate'];
  $deliveryDate = $_POST['deliveryDate'];
  $status = $_POST['status'];
  $shippingAddress = $_POST['shippingAddress'];
  $billingAddress = $_POST['billingAddress'];
  $contactPerson = $_POST['contactPerson'];
  $itemId = $_POST['itemId'];

  // Update the purchase order in the database
  $sql = "UPDATE new_purchase_order SET SupplierName = '$supplierName', PODate = '$poDate', DeliveryDate = '$deliveryDate', Status = '$status', ShippingAddress = '$shippingAddress', BillingAddress = '$billingAddress', ContactPerson = '$contactPerson', ItemID = '$itemId' WHERE POID = '$poid'";

  if ($conn->query($sql) === TRUE) {
    echo '<p class="success-message">Purchase Order updated successfully.</p>';
  } else {
    echo '<p class="error-message">Error updating purchase order: </p>' . $conn->error;
  }

  $conn->close();
} else {
  echo "Invalid request.";
}
?>
<a href="NewPurchaseOrder.php" class="btn">BACK TO PURCHASE ORDER LIST</a>
    </div>
</body>
</html>
