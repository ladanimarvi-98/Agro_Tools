<?php 
include('db.php');
?>
<html>
<head>
    <title>Products</title>
    <style>
        /* Styling for the title container */
        .title-container {
            text-align: center;
            background: #28a745;
            padding: 15px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
        }

        /* Table Styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #28a745;
            color: white;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            display: inline-block;
        }

        td a:hover {
            background: #218838;
        }

        /* Image Styling */
        .product-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class ="title-container">
        <h1>Product List </h1>
    </div>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc())
			{
          
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td><a href='product.php?id={$row['id']}'>View</a></td>
                  </tr>";
			}
        ?>
    
    </table>
</body>
</html>
