<?php 



include('config.php');


    if(isset($_POST['editProduct'])){

        $ID = $_POST['productId'];
        $NAME = $_POST['productName']; // للحصول على اسم المنتج من النموذج
        $PRICE = $_POST['productPrice']; // للحصول على سعر المنتج من النموذج
        $CATEGORY = $_POST['productCategory']; // للحصول على فئة المنتج من النموذج

       
        $IMG   =   $_FILES['productImage'];
        $IMG_LOCATION   =   $_FILES['productImage'] ['tmp_name'];                        // للحصول على المسار المؤقت للملف المرفوع
        $IMG_NAME    =   $_FILES['productImage'] ['name'];                           // للحصول على اسم الملف المرفوع 
        $UPLOAD_IMG  =   "upload-img/" .$IMG_NAME ;                                 // تحديد المسار النهائي للملف المرفوع

        $UPDATE  =   " UPDATE products SET name='$NAME',price='$PRICE',img='$UPLOAD_IMG' WHERE id=$ID ";
        mysqli_query($conn , $UPDATE);

        if(move_uploaded_file($IMG_LOCATION,"upload-img/".$IMG_NAME)){
            echo "<script>alert('File Editing successfully');</script>";
          } else {
              echo "<script>alert('Error Editing file');</script>";
          }

        
        header("location:products-Admin.php");
    }




?>