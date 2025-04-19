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
            echo "تم تسجيل الدخول بنجاح! جاري التوجيه...";
            header("Refresh: 2; url=/fitness_app/php/dashpord/dashpord.php");
            exit;
        } else {
            echo "الإيميل أو كلمة المرور غير صحيحة.";
        }
    } catch (PDOException $e) {
        echo "خطأ في قاعدة البيانات: " . $e->getMessage();
    }
} else {
    echo "لم يتم إرسال بيانات من الفورم!";
}
?>