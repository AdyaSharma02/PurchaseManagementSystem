<!DOCTYPE html>
<html>
<head>
    <title>Report: Purchase Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style type="text/css">
        body {
            margin-top: 40px;
            padding-top: 70px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1{
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

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        .footer p {
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
<h1><b>Generate Purchase Order Report</b></h1>
<form action="" method="post" class="container">
    <div class="form-group row">
        <label for="start_date" class="col-sm-2 col-form-label"><b>Start Date:</b></label>
        <div class="col-sm-4">
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        <label for="end_date" class="col-sm-2 col-form-label"><b>End Date:</b></label>
        <div class="col-sm-4">
            <input type="date" id="end_date" name="end_date" class="form-control" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" name="generate_report" class="btn btn-primary">Generate Report</button>
        </div>
    </div>
</form>
<?php
if (isset($_POST['generate_report'])) {
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

    // Get start and end dates from the form
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // SQL query to fetch data between the selected dates
    $sql = "SELECT * FROM new_purchase_order WHERE PODate BETWEEN '$start_date' AND '$end_date'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead">
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
                        </tr>
                    </thead>
                    <tbody>';

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
            echo "</tr>";
        }

        echo '</tbody>
                </table>
            </div>
        </div>';
    } else {
        echo '
    <div class="container text-center">
        <div class="alert alert-warning">
            <h4>No results found</h4>
            <p>Sorry, there are no purchase orders between the selected dates.</p>
        </div>
    </div>';
    }

    $conn->close();
}
?>
<footer class="footer">
    <p>&copy; 2023 Purchase Management System. All rights reserved.</p>
</footer>
</body>
</html>