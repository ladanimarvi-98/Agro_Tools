<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <form method="post" action="admin_add.php">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="price" placeholder="Product Price" required>
        <button type="submit">Add Product</button>
    </form>

    <?php
    include('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $query = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
        if ($conn->query($query)) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
