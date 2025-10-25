<?php
include 'connection.php'; // الربط مع قاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    // 🔒 تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "✅ تم إنشاء الحساب بنجاح!";
    } else {
        echo "❌ حدث خطأ أثناء التسجيل: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل حساب جديد</title>
</head>
<body>
  <h2>إنشاء حساب</h2>
  <form method="POST" action="">
    <label>اسم المستخدم:</label><br>
    <input type="text" name="username" required><br><br>

    <label>البريد الإلكتروني:</label><br>
    <input type="email" name="email" required><br><br>

    <label>كلمة المرور:</label><br>
    <input type="password" name="password" required><br><br>

    <label>اختر الدور:</label><br>
    <select name="role" required>
        <option value="">-- اختر الدور --</option>
        <option value="student">طالب</option>
        <option value="faculty">دكتور</option>
        <option value="staff">شؤون الطلاب</option>
    </select><br><br>

    <button type="submit">تسجيل</button>
  </form>
</body>
</html>