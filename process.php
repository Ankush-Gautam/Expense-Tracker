<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "income_expense_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$type = $_POST['type'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$transaction_date = $_POST['transaction_date'];
$user_id = $_SESSION['user_id'];

// Insert data into the transactions table
$sql = "INSERT INTO transactions (type, amount, description, transaction_date, user_id) VALUES ('$type', '$amount', '$description', '$transaction_date', '$user_id')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
