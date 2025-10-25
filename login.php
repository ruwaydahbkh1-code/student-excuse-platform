<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = trim($_POST['identifier']); // بريد أو رقم جامعي
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM users WHERE (email=? OR username=?) AND role=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $identifier, $identifier, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            echo "✅ تم تسجيل الدخول بنجاح!";
        } else {
            echo "❌ كلمة المرور خاطئة.";
        }
    } else {
        echo "❌ المستخدم غير موجود.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول</title>
</head>
<body>
  <h2>تسجيل الدخول</h2>
  <form method="POST" action="">
    <label>الرقم الجامعي أو البريد الإلكتروني:</label><br>
    <input type="text" name="identifier" required><br><br>

    <label>كلمة المرور:</label><br>
    <input type="password" name="password" required><br><br>

    <label>اختر الدور:</label><br>
    <select name="role" required>
        <option value="">-- اختر الدور --</option>
        <option value="student">طالب</option>
        <option value="faculty">دكتور</option>
        <option value="staff">شؤون الطلاب</option>
    </select><br><br>

    <button type="submit">دخول</button>
  </form>
</body>
</html>