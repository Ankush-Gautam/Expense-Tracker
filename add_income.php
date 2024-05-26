<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-5"><i class="fas fa-plus-circle"></i> Add Income</h2>
                        <form action="process.php" method="post">
                            <input type="hidden" name="type" value="income">
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
                            <button type="submit" class="btn btn-primary btn-block">Add Income</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>