/* db.php db.php - Database Connection */
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "agriculture_tools";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>