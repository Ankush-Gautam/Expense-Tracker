<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $transaction_date = $_POST['transaction_date'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "income_expense_tracker";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE transactions SET amount='$amount', description='$description', transaction_date='$transaction_date' WHERE id='$id' AND user_id='$user_id' AND type='expense'";

    if ($conn->query($sql) === TRUE) {
        header("Location: list_expense.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
