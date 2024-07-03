<!DOCTYPE html>
<html>
<head>
    <title>Delete Supplier</title>
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
            background-image: url("img1.jpg");
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
        <h2>DELETE SUPPLIER</h2>
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

            // Delete the supplier from the database
            $sql = "DELETE FROM supplier_list WHERE SupplierID = $id";
            if ($conn->query($sql) === TRUE) {
                echo '<p class="success-message">Supplier deleted successfully.</p>';
            } else {
                echo '<p class="error-message">Error deleting supplier: ' . $conn->error . '</p>';
            }
        } else {
            echo '<p class="error-message">Invalid request.</p>';
        }

        $conn->close();
        ?>
        <a href="SupplierList.php" class="btn">BACK TO SUPPLIER LIST</a>
    </div>
</body>
</html>















