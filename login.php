<?php
    session_start();
    include("connection/conn.php");

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT ID FROM userdata WHERE username = ? AND password = ? LIMIT 1");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->bind_result($ID);
        $result = $stmt->fetch();

        if($result) {
        $_SESSION['ID'] = $ID;
        header("Location: main/rating.php");
        } else {
            echo "<script>alert('Invalid')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
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

        .login-form {
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

<div class="login-form">
    <h2 class="text-center mb-4">Login</h2>
    <form method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        <a href="register.php" class="btn btn-primary w-100 mt-3">Register</a>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
