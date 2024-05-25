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

    <!-- bootstrap  -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <!-- my css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
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

            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                    <img src="./img/logo.webp" alt="Logo" class="image-fluid" style="width:60px; height:auto">
                    <h1 class="h2">Income/Expense Tracker</h1>
                </div>
                <div id="main-content">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="scripts.js"></script>
    
    <script>
        // Load dashboard content by default when the page loads
        $(document).ready(function() {
            loadContent('dashboard');
        });
    </script>
</body>
</html>
