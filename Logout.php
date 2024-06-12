<?php
session_start();

// قم بإزالة كل بيانات الجلسة
session_unset();

// أتمتة الإنهاء وتدمير الجلسة
session_destroy();

// إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
header("Location: loginPage.php");
exit();
?>
