<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income/Expense Tracker</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky pt-3">
                    <h5>Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="loadContent('dashboard')">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('add_income')">
                                <i class="fas fa-plus-circle"></i> Add Income
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('add_expense')">
                                <i class="fas fa-minus-circle"></i> Add Expense
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('list_income')">
                                <i class="fas fa-list-alt"></i> List Income
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('list_expense')">
                                <i class="fas fa-list-alt"></i> List Expense
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <div id="main-content">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
