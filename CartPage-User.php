<?php
// بدء الجلسة
session_start();

// التحقق مما إذا كان المستخدم مسجل الدخول
if (!isset($_SESSION['user_id'])) {
    // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول إذا لم يكن مسجلاً الدخول
    header("Location: loginPage.php");
    exit;
}

include('config.php');

$USER_ID = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./files-css/tec3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./files-css/products2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./files-css/navbar-User.css">

    <title>Confirm the Addition </title>
</head>
<body>

<style>

.navbar1 ,.navs{
    background-color: #c1e1f4 !important;

}
*{
   font-family: "Caveat", cursive;
}
   
    .divAll{
        margin-top: 5%;
        margin-bottom: 10%;
    }
    table{
        margin-top: 3%;
    }
    .divAll h2{
        text-align: center;
    }
    table thead tr{
        background-color: rgb(220, 210, 210);
        text-align: center;
    }
    table tbody tr{
        text-align: center;
        align-items: center !important;
        justify-content: center !important;
    }
    table tbody tr td {
        padding: 0px;
        margin: 0px;
        font-weight: bold;
        color: rgb(88, 82, 82);
    }
    tbody td a{
        height: 25px;
        font-size: 15px !important;
        line-height: 9px !important;
    }
    .nav1-icon{
        color: black;
    }



    @media(max-width:575px){
.table th{
    font-size: 13px !important;
}

.priceProduct , .nameProduct{
    font-size: 12px;
    font-weight: bold !important;
}
.deleteBtn{
    font-size: 10px !important;
    line-height: 10px !important;
}

.delProduct{
    margin: auto !important;
    padding: 2px !important;

}

.divAll h2{
    margin-bottom: 2rem !important;
    margin-top: 2rem !important;
    font-size: 22px;
}
}



</style>

<div class="navbar1 container  shadow-sm ">

        <nav class="navbar navbar-light  navs  row ">

           
          <div class="nav1 col-2">
          <a class="navbar-brand" href="Product-User.php">
                <img src="./img/logo2.png" alt="d" class="d-inline-block align-text-top logoImg">
            </a>
          
          </div>
   
        <div class="nav2  col-7 "> 
                            
            <div class="navbar navbar-expand nav2-menu "  id="navbarNavDropdown">
                <ul class="navbar-nav navbar-nav2  ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mobile 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            <li><a class="dropdown-item" href="#"> Iphone</a></li>
                            <li><a class="dropdown-item" href="#"> Samsung</a></li>
                            <li><a class="dropdown-item" href="#"> Huawei</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Computers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li><a class="dropdown-item" href="#"> Laptops </a></li>
                            <li><a class="dropdown-item" href="#"> Desktop Computers</a></li>
                            <li><a class="dropdown-item" href="#"> Personal Desktops</a></li>
                            <li><a class="dropdown-item" href="#"> Tablets </a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cameras
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                            <li><a class="dropdown-item" href="#"> Nikon </a></li>
                            <li><a class="dropdown-item" href="#"> Canon</a></li>
                            <li><a class="dropdown-item" href="#"> Sony</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hideOthers" href="#" id="navbarDropdownMenuLink4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Other devices
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink4">
                            <li><a class="dropdown-item" href="#"> Printer</a></li>
                            <li><a class="dropdown-item" href="#"> Speakers</a></li>
                            <li><a class="dropdown-item" href="#"> Microphone</a></li>
                            <li><a class="dropdown-item" href="#"> Keyboard</a></li>
                            <li><a class="dropdown-item" href="#"> Screen</a></li>

                        </ul>
                    </li>
                </ul> 
            </div>
    
       
        </div>


        <div class="nav3 col-3">
        
           <div class="dropdown ">
           <a href="CartPage-User.php"> <i class="bi bi-cart4 nav1-icon " ></i></a>

           <i class="bi bi-person-circle nav1-icon text-dark" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false"> User</i>
           <ul class="dropdown-menu" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
           </ul>
       
           </div>
        </div>

        </nav>
</div>
<div class="container divAll">
    <h2>Shopping cart</h2>
    <?php
    $RESULT = mysqli_query($conn, "SELECT * FROM `cart-user` WHERE user_id = $USER_ID");

    while($row = mysqli_fetch_array($RESULT)){
        echo "
        <table class='table container shadow'>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Delete Product</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='col-4 nameProduct'>{$row['name']}</td>
                    <td class='col-4 priceProduct'>$ {$row['price']}.00</td>
                    <td class='col-4 delProduct'>
                        <a class='btn btn-danger deleteBtn' href='deleteproductCart-user.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>";
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
