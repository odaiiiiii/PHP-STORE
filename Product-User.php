
<?php 

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: loginPage.php");
    exit() ; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./files-css/tec3.css"> <!-- هنا تضيف رابط ملف CSS الخارجي -->
    <link rel="stylesheet" href="./files-css/navbar-User.css">
    <link rel="stylesheet" href="./files-css/product-user-card.css">



    <title>Products / المنتجات </title>
</head>

<body>

<style>

.navbar1 ,.navs{
    background-color: #c1e1f4 !important;
 

}

*{
   font-family: "Caveat", cursive;
}
   
.product-image{
    padding: 20px !important;
}

</style>


<div class="navbar1  shadow-sm container ">

        <nav class="navbar  navbar-light  navs  row ">

           
          <div class="nav1 col-2">
          <a class="navbar-brand" href="#">
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

        
    <h2 class="container AllProducts ">All Products </h2>


        <div class="products   container row">
        <?php
    
    include("config.php");
    $result = mysqli_query($conn, "SELECT * FROM products");
    while($row =mysqli_fetch_array($result)){
        echo "

       
        <div class='col-6 col-xl-4 col-lg-4 col-md-4 col-sm-6  custom-col' >
        <div class='card product shadow ' >
            <img class='card-img-top   product-image' src='$row[img]' >
            <div class='card-body '>
       
                <div class='product-content '>       
                Device type :  <p class='card-text'>  $row[name] </p>
                </div>

                <div class='product-content'>
                    Device price : <p class='card-text'>  $$row[price].00 </p>
                    </div>
                    <div class='product-content'>
                    Device category :   <div class='Category'>$row[Category]</div>
                    </div>

                    <a href='AddToCart-User.php?id=$row[id]' class='btn  btnAddToCart row'>
                       <p class='col-lg-10 col-9 m-0 resbtn'>Add to cart </p> <i class='bi bi-cart4 col-lg-2 col-3'></i>
                       
                    </a>
                    
            </div>
            </div>
       
       </div>

  ";
    }

    
    ?>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>





         






