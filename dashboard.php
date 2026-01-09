<?php
require 'db.php';

// Security Check: If not logged in, go back to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle Adding Expense
if (isset($_POST['add_expense'])) {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $conn->query("INSERT INTO expenses (user_id, title, amount, date) VALUES ('$user_id', '$title', '$amount', '$date')");
    header("Location: dashboard.php"); // Refresh page to prevent resubmission
}

// Handle Delete Expense
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM expenses WHERE id='$id' AND user_id='$user_id'");
    header("Location: dashboard.php");
}

// Fetch Expenses & Calculate Total
$result = $conn->query("SELECT * FROM expenses WHERE user_id='$user_id' ORDER BY date DESC");
$total_expense = $conn->query("SELECT SUM(amount) as total FROM expenses WHERE user_id='$user_id'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">💰 SpendWise Dashboard</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </nav>

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card bg-primary text-white p-3 text-center">
                    <h3>Total Spent: ₹<?php echo number_format($total_expense, 2); ?></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Add New Expense</h5>
                    <form method="POST">
                        <div class="mb-2"><input type="text" name="title" class="form-control" placeholder="Expense Name (e.g. Food)" required></div>
                        <div class="mb-2"><input type="number" step="0.01" name="amount" class="form-control" placeholder="Amount (₹)" required></div>
                        <div class="mb-3"><input type="date" name="date" class="form-control" required></div>
                        <button type="submit" name="add_expense" class="btn btn-success w-100">Add Expense</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card p-3 shadow-sm">
                    <h5>Recent Transactions</h5>
                    <table class="table table-hover mt-2">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td class="text-danger fw-bold">-₹<?php echo $row['amount']; ?></td>
                                <td>
                                    <a href="dashboard.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger">X</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>