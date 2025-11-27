<?php 
session_start(); 
?>
<html>
<head>
    <title>Cart</title>
    <style>
	/* General Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    text-align: center;
    margin: 0;
    padding: 20px;
}

/* Heading Styling */
h1 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

/* Table Styling */
table {
    width: 50%;
    margin: auto;
    border-collapse: collapse;
    background: #ffffff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background: #28a745;
    color: white;
    font-weight: bold;
}

/* Empty Cart Message */
p {
    font-size: 18px;
    color: red;
    font-weight: bold;
}

/* Button Styling */
button {
    background: #28a745;
    color: white;
    font-size: 16px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 20px;
}

button:hover {
    background: #218838;
}

</style>
</head>
<body>
    <h1>Shopping Cart</h1>
    
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table border='1'>";
        echo "<tr><th>Product ID</th><th>Quantity</th></tr>";
        
        foreach ($_SESSION['cart'] as $id => $qty) {
            echo "<tr><td>$id</td><td>$qty</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p><b>Cart is empty.</b></p>";
    }
    ?>
    <a href="checkout.php"><button>Proceed to Checkout</button></a><br><br>
	<a href="index.php">Back to Home</a>
</body>
</html>
