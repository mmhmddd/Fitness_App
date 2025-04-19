<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Fitness App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Welcome to Fitness App</h1>
                <p class="lead mb-5">Track your workouts and calories to stay fit!</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="./php/auth/register/register.html" class="btn btn-primary btn-lg">Register</a>
                    <a href="./php/auth/login/login.html" class="btn btn-outline-primary btn-lg">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>