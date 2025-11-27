<html>
<head>
<style>
/* General Page Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    text-align: center;
    margin: 0;
    padding: 20px;
}

/* Checkout Message Styling */
.checkout-message {
    font-size: 22px;
    font-weight: bold;
    margin: 20px auto;
    padding: 15px;
    width: 50%;
    border-radius: 5px;
}

/* Success Message */
.success {
    background-color: #28a745;
    color: white;
}

/* Error Message */
.error {
    background-color: #dc3545;
    color: white;
}

/* Button Styling */
button {
    background: #007bff;
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
    background: #0056b3;
}

</style>
</head>
<body>

<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];

    if (!empty($_SESSION['cart'])) {
        $items = json_encode($_SESSION['cart']); 
        $query = "INSERT INTO orders (customer_name, address, items) VALUES ('$name', '$address', '$items')";
        
        if ($conn->query($query) === TRUE) {
            echo "<div class='checkout-message success'>Order placed successfully!</div>";
            unset($_SESSION['cart']); 
        } else {
            echo "<div class='checkout-message error'>Error: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='checkout-message error'>Your cart is empty!</div>";
    }
}
?>

<a href="index.php"><button>Back to Home</button></a><br><br>
<a href="user_logout.php" style="color:red;">Logout</a>

</body>
</html>