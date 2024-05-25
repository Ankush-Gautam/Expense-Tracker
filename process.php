<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "income_expense_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$type = $_POST['type'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$transaction_date = $_POST['transaction_date'];

// Insert data into the transactions table
$sql = "INSERT INTO transactions (type, amount, description, transaction_date) VALUES ('$type', '$amount', '$description', '$transaction_date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect back to the main page
header("Location: index.html");
exit();
?>
