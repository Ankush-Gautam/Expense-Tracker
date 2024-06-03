<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: list_expense.php");
    exit();
}

$id = $_GET['id'];
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

$sql = "SELECT * FROM transactions WHERE id='$id' AND user_id='$user_id' AND type='expense'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: list_expense.php");
    exit();
}

$expense = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

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
            <!-- sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky pt-3">

                    <!-- user greeting div -->
                    <div class="d-flex align-items-center mb-5">
                        <i class="fas fa-user-circle fa-3x"></i>
                        <h5 class="mt-2 ml-2">Welcome, <?php echo $_SESSION['username']; ?></h5>
                    </div>

                    <!-- nav-list menu items  -->
                    <ul class="nav flex-column">

                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="#" onclick="loadContent('dashboard')">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#" onclick="loadContent('add_income')">
                                <i class="fas fa-plus-circle"></i> Add Income
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#" onclick="loadContent('add_expense')">
                                <i class="fas fa-minus-circle"></i> Add Expense
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#" onclick="loadContent('list_income')">
                                <i class="fas fa-list-alt"></i> List Incomes
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#" onclick="loadContent('list_expense')">
                                <i class="fas fa-list-alt"></i> List Expenses
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- main editing section -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Expense</h1>
                </div>
                <div class="container">
                    <form action="process_edit_expense.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="<?php echo $expense['amount']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" id="description" class="form-control" value="<?php echo $expense['description']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="transaction_date">Date:</label>
                            <input type="date" name="transaction_date" id="transaction_date" class="form-control" value="<?php echo $expense['transaction_date']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Expense</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>