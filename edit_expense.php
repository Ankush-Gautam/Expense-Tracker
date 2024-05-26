<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (!isset($_GET['id'])) {
    header("Location: list_expense.php");
    exit();
}

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

$sql = "SELECT * FROM transactions WHERE id='$id' AND user_id='$user_id' AND type='expense'";
$result = $conn->query($sql);

if ($result->num_rows !== 1) {
    header("Location: list_expense.php");
    exit();
}

$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include('sidebar.php'); ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2"><i class="fas fa-edit"></i> Edit Expense</h2>
                </div>
                <div class="container">
                    <form action="update_expense.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="<?php echo $row['amount']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" id="description" class="form-control" value="<?php echo $row['description']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="transaction_date">Date:</label>
                            <input type="date" name="transaction_date" id="transaction_date" class="form-control" value="<?php echo $row['transaction_date']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Expense</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>