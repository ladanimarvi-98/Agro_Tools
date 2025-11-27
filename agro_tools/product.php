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

/* Product Message Styling */
.product-message {
    font-size: 20px;
    font-weight: bold;
    color: #28a745; /* Green message for success */
    background: #d4edda;
    padding: 15px;
    width: 50%;
    margin: 20px auto;
    border-radius: 5px;
    border: 1px solid #155724;
}

/* View Cart Button */
.view-cart {
    display: inline-block;
    text-decoration: none;
    background: #007bff;
    color: white;
    padding: 12px 20px;
    font-size: 18px;
    border-radius: 5px;
    transition: 0.3s;
    margin-top: 20px;
}

.view-cart:hover {
    background: #0056b3;
}


</style>

<?php 
session_start();
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += 1; 
    } else {
        $_SESSION['cart'][$id] = 1; 
    }

    echo "<div class='product-message'>Product added to cart!</div>";
}
?>

<a href="cart.php" class="view-cart">View Cart</a><br>
<a href="user_logout.php" style="color:red;">Logout</a><br><br>
 
</body>
</html>
