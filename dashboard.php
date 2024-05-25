<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "income_expense_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$total_income = 0;
$total_expense = 0;

$sql_income = "SELECT SUM(amount) AS total FROM transactions WHERE type='income' AND user_id='$user_id'";
$result_income = $conn->query($sql_income);
if ($result_income->num_rows > 0) {
    $total_income = $result_income->fetch_assoc()['total'];
}

$sql_expense = "SELECT SUM(amount) AS total FROM transactions WHERE type='expense' AND user_id='$user_id'";
$result_expense = $conn->query($sql_expense);
if ($result_expense->num_rows > 0) {
    $total_expense = $result_expense->fetch_assoc()['total'];
}

$conn->close();
?>

<h2>Dashboard</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Income</h5>
                <p class="card-text">$<?php echo number_format($total_income, 2); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Expense</h5>
                <p class="card-text">$<?php echo number_format($total_expense, 2); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Net Balance</h5>
                <p class="card-text">$<?php echo number_format($total_income - $total_expense, 2); ?></p>
            </div>
        </div>
    </div>
</div>
