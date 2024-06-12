<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // إذا لم يكن المستخدم مسجل الدخول، قم بإعادة توجيهه إلى صفحة تسجيل الدخول
    header("Location: login.php");
    exit();
}

include('config.php');

if (isset($_POST['submitProduct'])) {
    $NAME = $_POST['productName'];
    $PRICE = $_POST['productPrice'];
    $CATEGORY = $_POST['productCategory'];

    $IMG = $_FILES['productImage'];
    $IMG_LOCATION = $IMG['tmp_name'];   // يخزن في المتغير المسار المؤقت للملف  $IMG_LOCATION 
    $IMG_NAME = $IMG['name'];   // يخزن في المتغير  اسم الملف المرفوع $IMG_NAME
    $UPLOAD_IMG = "../upload-img/" . $IMG_NAME;   // يخزن في المتغير  المسار النهائي للملف المرفوع   $UPLOAD_IMG

    $INSERT = "INSERT INTO products(name, Category, price, img) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssds", $NAME, $CATEGORY, $PRICE, $UPLOAD_IMG);
    $stmt->execute();

    if (move_uploaded_file($IMG_LOCATION, $UPLOAD_IMG)) {                      // قوم بنقل الملف من موقعه المؤقت  إلى الموقع النهائي المحدد 
        echo "<script>alert('File uploaded successfully');</script>";
    } else {
        echo "<script>alert('Error uploading file');</script>";
    }
    header("Location: products-Admin.php");
    exit();
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
