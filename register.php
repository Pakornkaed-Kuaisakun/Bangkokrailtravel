<?php
session_start();
include("connection/conn.php");

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if($confirm_password == $password) {
        $stmt = $conn->prepare("SELECT username FROM userdata WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if($result->num_rows === 0) {

            $stmt = $conn->prepare("INSERT INTO userdata (username, password) VALUES (?, ?)");
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();

            if ($stmt) {
                echo "<script>alert('Success')</script>";
                
            } else {
                echo "<script>alert('Error')</script>";
            }
        } else {
            echo "<script>alert('This username have already.')</script>";
        }
    } else {
        echo "<script>alert('Password does not match.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .register-form {
            width: 300px;
            padding: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="register-form">
        <h2 class="text-center mb-4">Register</h2>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
            <a href="login.php" class="btn btn-primary w-100 mt-3">Back</a>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>