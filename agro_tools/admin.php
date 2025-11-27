<?php
include('db.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="price" placeholder="Product Price" required><br>
        <button type="submit">Add Product</button><br><br>
        <a href="logout.php" style="color:red;">Logout</a>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $query = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    
    if ($conn->query($query) === TRUE) {
        echo "<br><br>Product added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
</body>
</html>
