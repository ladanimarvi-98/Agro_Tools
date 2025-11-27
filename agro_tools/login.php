<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            padding: 50px;
            background-color: #f8f9fa;
        }
        form {
            display: inline-block;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input {
            padding: 10px;
            margin: 10px;
            width: 80%;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 5px;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .nav-link {
            display: block;
            margin-top: 15px;
        }
        .nav-link a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .nav-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button><br><br>

        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

        <div class="nav-link">
            <a href="index.php">Back to Home</a>
        </div>
    </form>
</body>
</html>
