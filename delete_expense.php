<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "income_expense_tracker";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM transactions WHERE id='$id' AND user_id='$user_id' AND type='expense'";

    if ($conn->query($sql) === TRUE) {
        header("Location: list_expense.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
