<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Check if email or phone already exists
    $checkUser = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email or Phone Number already exists!'); window.location.href='signup.php';</script>";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (fullname, phone, email, password) VALUES ('$fullname', '$phone', '$email', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Signup Successful! You can now login.'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
        <!-- Centered Logo -->
        <div class="text-center mb-3">
            <img src="images/BHUMI (2).png" alt="Logo" style="width: 150px;">
        </div>
        <div class="text-left mb-3">
            <h3>Signup</h3>
        </div>

        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Signup</button>
        </form>

        <div class="text-center mt-3">
            Already have an account? <a href="login.php" class="text-success">Login</a>
        </div>
    </div>
</div>

</body>
</html>
