<?php
require_once 'C:\xampp\htdocs\fitness_app\includes\config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        echo "تم التسجيل بنجاح! جاري التوجيه...";
        header("Refresh: 2; url=../login/login.html");
        exit;
    } catch (PDOException $e) {
        echo "خطأ في قاعدة البيانات: " . $e->getMessage();
    }
} else {
    echo "لم يتم إرسال بيانات من الفورم!";
}
?>