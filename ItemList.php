<!DOCTYPE html>
<html>
<head>
  <title>ItemList: Purchase Management System</title>
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

        .container {
            margin-top: 80px;
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


        form {
          max-width: 400px;
          margin: 0 auto;
          background-color: #f2f2f2;
          padding: 20px;
          border-radius: 5px;
          text-transform: uppercase;
        }

        h2 {
          text-align: center;
          text-transform: uppercase;
          text-align: center;
          color: #333;
          font-size: 25px;
          margin-bottom: 20px;
          animation: slide-up 1s ease-in;
        }

        .icon {
          margin-right: 5px;
          color: white;
        }


        .form-submit {
          width: 100%;
          margin-top: 5px;
          padding: 12px 20px;
          background-color: #3366ff;
          color: #fff;
          border: none;
          border-radius: 4px;
          font-size: 16px;
          font-weight: bold;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        .form-submit:hover,
        .form-submit:focus {
          background-color: #00A3FF;
          outline: none;
          border: 2px solid white;
        }

        @media (max-width: 576px) {
          form {
            max-width: 100%;
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
  <form name="frm" action="http://localhost/Project/ItemList.php" method="post">
    <h2>Item Selection</h2>
    <div class="form-group">
      <label for="itemName"><b><i class="fas fa-list icon" style="color: black;"></i>Item Name</b></label>
      <select class="form-control" name="itemName">
        <option value="Gadget A" selected>Gadget A</option>
        <option value="Gadget B">Gadget B</option>
        <option value="Gadget C">Gadget C</option>
        <option value="Gadget D">Gadget D</option>
      </select>
    </div>
    <div class="form-group">
      <label><b><i class="fas fa-sort-numeric-up icon" style="color: black;"></i>Quantity</b></label>
      <input type="text" class="form-control" name="quantity" required>
    </div>
    <button class="form-submit" type="submit"><i class="fas fa-check icon"></i> Submit</button>
    <button class="form-submit" type="reset"><i class="fas fa-sync-alt refresh-icon"></i> Refresh</button>
  </form>
</div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM item_list";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <html>
    <head>
        <title>Responsive Table</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .table-container {
                margin-top: 30px;
                margin-left: 19%;
            }
        </style>
    </head>
    <body>
        <div class="table-container">
            <table class="table table-striped table-responsive table-hover table-white">
                <thead class="thead-light">
                    <tr>
                        <th>ItemID</th>
                        <th>ItemName</th>
                        <th>Description</th>
                        <th>SupplierID</th>
                        <th>UnitPrice</th>
                        <th>Quantity</th>
                        <th>TotalPrice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['itemName'])) {
                        $itemName = $_POST['itemName'];
                    }
                    if (isset($_POST['quantity'])) {
                        $quantity = $_POST['quantity'];
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ItemID"] . "</td>";
                        echo "<td>" . $row["ItemName"] . "</td>";
                        echo "<td>" . $row["Description"] . "</td>";
                        echo "<td>" . $row["SupplierID"] . "</td>";
                        echo "<td>" . $row["UnitPrice"] . "</td>";
                        if (isset($itemName) && $itemName == $row["ItemName"]) {
                            if (isset($quantity)) {
                                echo "<td><b>" . $quantity . "</b></td>";
                                $totalPrice = $quantity * $row["UnitPrice"];
                                echo "<td><b>" . $totalPrice . "</b></td>";
                            }
                        } else {
                            //$randomQuantity= rand(1, 100);
                            //$totalPrice = $randomQuantity * $row["UnitPrice"];
                            //echo "<td>" . $randomQuantity . "</td>";
                            //echo "<td>" . $totalPrice . "</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
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
    padding: 20px;
    text-align: center;
    margin-top: auto;
    width: 100%;
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
