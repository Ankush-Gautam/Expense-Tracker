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