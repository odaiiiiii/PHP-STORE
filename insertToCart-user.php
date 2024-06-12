<?php
session_start();
include("config.php");

if (isset($_POST['btnAdd'])) {
    $NAME = $_POST['namePro'];
    $PRICE = $_POST['pricePro'];
    $USER_ID = $_SESSION['user_id']; // الحصول على معرف المستخدم من الجلسة

    $INSERT = "INSERT INTO `cart-user` (name, price, user_id) VALUES ('$NAME', '$PRICE', '$USER_ID')";
    mysqli_query($conn, $INSERT);
    header("Location: CartPage-User.php");
}
?>
