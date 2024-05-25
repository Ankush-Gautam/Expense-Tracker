<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Add Expense</h2>
                        <form action="process.php" method="post">
                            <input type="hidden" name="type" value="expense">
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" id="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" name="description" id="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="transaction_date">Date:</label>
                                <input type="date" name="transaction_date" id="transaction_date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add Expense</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>