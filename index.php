<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income/Expense Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Income/Expense Tracker</h1>

    <nav>
        <ul>
            <li><a href="#" class="tablink" onclick="openTab(event, 'Income')">Income</a></li>
            <li><a href="#" class="tablink" onclick="openTab(event, 'Expense')">Expense</a></li>
        </ul>
    </nav>

    <div id="Income" class="tabcontent">
        <h2>Add Income</h2>
        <form action="process.php" method="post">
            <input type="hidden" name="type" value="income">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" id="amount" required><br>

            <label for="description">Description:</label>
            <input type="text" name="description" id="description"><br>

            <label for="transaction_date">Date:</label>
            <input type="date" name="transaction_date" id="transaction_date" required><br>

            <button type="submit">Add Income</button>
        </form>

        <h2>Income History</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include income-specific PHP code here
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

                $sql = "SELECT * FROM transactions WHERE type='income' ORDER BY transaction_date DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['amount']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['transaction_date']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No income records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div id="Expense" class="tabcontent">
        <h2>Add Expense</h2>
        <form action="process.php" method="post">
            <input type="hidden" name="type" value="expense">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" id="amount" required><br>

            <label for="description">Description:</label>
            <input type="text" name="description" id="description"><br>

            <label for="transaction_date">Date:</label>
            <input type="date" name="transaction_date" id="transaction_date" required><br>

            <button type="submit">Add Expense</button>
        </form>

        <h2>Expense History</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include expense-specific PHP code here
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

                $sql = "SELECT * FROM transactions WHERE type='expense' ORDER BY transaction_date DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['amount']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['transaction_date']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No expense records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>
