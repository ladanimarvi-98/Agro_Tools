<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<head>
    <title>User Login</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            background: #f0f0f0;
        }
        form {
            background: white;
            display: inline-block;
            margin-top: 100px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input {
            margin: 10px;
            padding: 10px;
            width: 90%;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h2>User Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button><br>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
</form>

</body>
</html>
