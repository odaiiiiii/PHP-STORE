<?php 

include('config.php');

if(isset($_POST['btnRegister'])){
    $NAME = $_POST['name'];
    $USERNAME = $_POST['userName'];
    $EMAIL = $_POST['email'];
    $PASS = $_POST['pass'];
    
    // عشان يتاكد ان الايميل غير مكرر
    $SELECT_EMAIL = "SELECT * FROM register WHERE email = ?";         //علامة الاستفهام (?) هي عنصر نائب (placeholder) يمثل المتغير الذي سيتم تمريره لاحقًا. 
    $stmt_EMAIL = $conn->prepare($SELECT_EMAIL);   // تحضير الاستعلام
    $stmt_EMAIL->bind_param("s", $EMAIL);
    /*
    هنا، نستخدم bind_param لربط المتغير $EMAIL بعلامة الاستفهام (?) في جملة الاستعلام.
    "s" يشير إلى نوع البيانات التي سيتم تمريرها. في هذه الحالة، "s" تعني أن البيانات من نوع سلسلة (string).
    */
    $stmt_EMAIL->execute();  // تنفيذ الاستعلام:
    $result_EMAIL = $stmt_EMAIL->get_result();  // الحصول على النتائج

        // عشان يتاكد ان user Name  غير مكرر

    $SELECT_USER = "SELECT *  FROM register WHERE userName = ? ";
    $stmt_USER = $conn->prepare($SELECT_USER);
    $stmt_USER->bind_param("s",$USERNAME);

    $stmt_USER->execute();
    $result_USER = $stmt_USER->get_result();



        //في هذه الخطوة، نتحقق مما إذا كانت نتيجة الاستعلام تحتوي على أي صفوف.
        //إذا كان العدد أكبر من 0، فهذا يعني أن البريد الإلكتروني الذي أدخله المستخدم موجود بالفعل في قاعدة البيانات.

        // التحقق اذا كان الايميل مكرر او لا
    if($result_EMAIL->num_rows > 0){
        echo "<script> alert('This email is already registered. Go to the login page' ) ;location.href = 'loginPage.php'; </script>";
    }
            // التحقق اذا كان اسم المستخدم  مكرر او لا
    elseif($result_USER->num_rows > 0){
        echo "<script> alert('This username  is already is already taken. Please choose a different username.' ) ;location.href = 'register.php'; </script>";

    }
    
    else {
        // لاضافة البيانات في قاعدة البيانات
        $INSERT = "INSERT INTO register (name, userName, email, pass) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssss", $NAME, $USERNAME, $EMAIL, $PASS);    // هنا، نستخدم bind_param لربط المتغيرات بعلامات الاستفهام (?) في جملة الإدخال.
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            header("Location: loginPage.php");
        } else {
            echo "<script> alert('Registration failed. Please try again.') </script>";
        }
    }
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

?>
