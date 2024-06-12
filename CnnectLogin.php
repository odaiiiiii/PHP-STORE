<?php
include('config.php');
session_start();

if (isset($_POST['btnLogin'])) {
    $EMAIL = $_POST['email'];
    $PASS = $_POST['pass'];

    // التحقق من بيانات تسجيل الدخول
    $SELECT = "SELECT * FROM register WHERE email = ? AND pass = ?";  // يجلب البيانات من جدول التسجيل
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("ss", $EMAIL, $PASS);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {                   //  يتاكد اذا موجود بقاعدة البيانات (اذا كان العدد اكبر من 0 يعني موجود بقاعدة البيانات  والمستخدم موجود )
        $row = $result->fetch_assoc();  
        $_SESSION['user_id'] = $row['id']; // قم بتعيين معرف المستخدم هنا
        $_SESSION['username'] = $row['username']; // قم بتعيين اسم المستخدم هنا
        $_SESSION['email'] = $row['email'];


        if ($EMAIL === 'admin@admin.com' && $PASS === '1234') {
            // إذا كانت بيانات الدخول هي بيانات المسؤول، إعادة توجيه المستخدم إلى صفحة المسؤول
            echo "<script>
             alert('Admin login successful!');
             location.href = 'Admin.php';
              </script>";
        } else {
            // إذا كانت بيانات الدخول صحيحة ولكن ليست للمسؤول، إعادة توجيه المستخدم إلى صفحة المنتجات
            echo "<script> alert('Login successful!'); location.href = 'Product-User.php'; </script>";
        }
    } else {
        // إذا كانت بيانات الدخول غير صحيحة، عرض رسالة خطأ
        echo "<script> alert('Invalid email or password. Please try again.'); location.href = 'loginPage.php'; </script>";
    }

    // إغلاق البيان
    $stmt->close();
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
