<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $check_user = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check_user);

    if ($result->num_rows > 0) {
        $error = "Username already taken!";
    } else {
        $hashed_password = md5($password); 
        $insert_user = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($insert_user)) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            $error = "Error during registration!";
        }
    }
}
?>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            text-align: center;
        }
        form {
            background: white;
            padding: 30px;
            margin-top: 100px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input {
            margin: 10px;
            padding: 10px;
            width: 90%;
        }
        button {
            background: #28a745;
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

<h2>Register New User</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Choose Username" required><br>
    <input type="password" name="password" placeholder="Choose Password" required><br>
    <button type="submit">Register</button><br>
    <p>Already have an account? <a href="user_login.php">Login here</a></p>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
</form>

</body>
</html>
