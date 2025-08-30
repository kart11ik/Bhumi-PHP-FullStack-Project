<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
            background: url('images/bg_3.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-end align-items-center vh-100">
    <div class="card p-4" style="width: 400px;">
        <div class="text-center mb-3">
            <img src="images/BHUMI (2).png" alt="Logo" style="width: 150px;">
        </div>
        <div class="text-left mb-3">
            <h3>Login</h3>
        </div>

        <?php 
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']); // Remove error after showing it
        }
        ?>

        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
        
        <div class="text-center mt-3">
            Don't have an account? <a href="signup.php" class="text-success">Signup</a>
        </div>
    </div>
</div>
</body>
</html>
