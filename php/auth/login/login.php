<?php
require_once 'C:/xampp/htdocs/fitness_app/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            echo "Login successful! Redirecting...";
            header("Refresh: 2; url=/fitness_app/php/dashpord/dashpord.php");
            exit;
        } else {
            echo "Incorrect email or password.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
} else {
    echo "No data submitted from the form!";
}
?>
