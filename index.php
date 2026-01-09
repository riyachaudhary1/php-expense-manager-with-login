<?php
require 'db.php';

// Handle Register/Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_POST['register'])) {
        // REGISTER USER (Encrypt Password)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration Successful! Please Login.');</script>";
        } else {
            echo "<script>alert('Error: Email already exists.');</script>";
        }
    } elseif (isset($_POST['login'])) {
        // LOGIN USER
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify Password
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id']; // Save User ID in Session
                $_SESSION['email'] = $row['email'];
                header("Location: dashboard.php"); // Redirect to Dashboard
                exit();
            }
        }
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SpendWise | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { width: 400px; border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
    <div class="card p-4">
        <h3 class="text-center mb-4">💰 SpendWise</h3>
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item"><button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button></li>
            <li class="nav-item"><button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Register</button></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="login">
                <form method="POST">
                    <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                    <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
            <div class="tab-pane fade" id="register">
                <form method="POST">
                    <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                    <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
                    <button type="submit" name="register" class="btn btn-success w-100">Create Account</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>