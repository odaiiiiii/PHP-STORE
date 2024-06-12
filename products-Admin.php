

<?php  

    session_start();
   
    if(!isset($_SESSION['user_id'])){    // يتاكد ان المستخد موجود 
        header("Location: loginPage.php");
        exit();
    }
    elseif(isset($_SESSION['email']) && $_SESSION['email'] !== 'admin@admin.com') {
        header("Location: Product-User.php");

            exit();

        }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./files-css/products4.css">
    <link rel="stylesheet" href="./files-css/AdminNav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./files-css//admin.css">

    <title>Products / المنتجات </title>
</head>

<body>


<style>

.divNav ,.navbar1{
    background-color: #c1e1f4;
    width: 100% !important;
  }
  .divNav{
    padding: .5rem 1.5rem !important;
  }
.divNav{
    background-color: #c1e1f4;
  }




.products{
    gap: 5%;
   
}

.product{
    
    margin-bottom: 2.6rem;
    margin-top: 2.6rem;
    width: 30%;   
}

@media(max-width:992px){
    
.products{
    gap: 3%;

}
.product{
    width: 45% !important;
    
    
}
.product-image{
    min-width:  100%;
    height: 220px;

}


}
@media(max-width:767px){

    .product-image{
    min-width:  100%;
    height: 180px;

}

.product .card-title{
    font-size: 17px;
    margin: 10px 0px;
  
}
.products .Category{
    font-size: 13px; 


}


.btnEditDel{
    font-size: 13px;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
    padding:  0px !important;
    line-height: 24px;
}
}


@media(max-width:550px){
    .product{
    
    margin-bottom: 1.5rem !important;
    margin-top: 1.5rem !important;

    
}

.product .card-title{
    font-size: 16px;
    margin: 15px 0px;
    text-transform: uppercase;
  
}

.product-image{
    min-width:  100%;
    height: 180px;
    padding: 20px !important;


}
@media(max-width:490px){
    .product{
    
 
    width: 60% !important;

    
}
.AllProducts{
    margin-top: 3rem !important;
}

}

@media(max-width:415px){
    .product{
    
 
    width: 70% !important;

    
}

}
}
</style>

    <!-- NAV  -->

    <div class="navbar1 shadow-sm container  ">

        <nav class="navbar  navbar-light container  divNav row ">

           
          <div class="nav1 col-2">
          <a class="navbar-brand" href="#">
                <img src="./img/logo2.png" alt="d" class="d-inline-block align-text-top logoImg">
            </a>
          
          </div>


            
        <div class="nav2  col-8 "> 
            
            
        
            <div class="navbar navbar-expand nav2-menu "  id="navbarNavDropdown">
                <ul class="navbar-nav navbar-nav2  ">
                  
                 
                   
                    <li class="nav-item dropdown">
                        <a href="#" id="navbarDropdownMenuLink4" role="button"  aria-expanded="false" class="hide">
                       Products
                        </a>
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a href="products-Admin.php" id="navbarDropdownMenuLink3" role="button"  aria-expanded="false">
                         Edit & Delete
                        </a>
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a  href="Admin.php" id="navbarDropdownMenuLink1" role="button"  aria-expanded="false">
                        Add Product 
                        </a>
                       
                    </li>
                    <li class="nav-item dropdown">
                        <a  href="loginPage.php" id="navbarDropdownMenuLink2" role="button" aria-expanded="false" class="hide">
                        Settings
                        </a>
                       
                    </li>
                </ul> 
            </div>
    
       
        </div>


        <div class="nav3 col-2">
        
           <div class="admintext">
           <div class="dropdown">
        <i class="bi bi-person-circle nav1-icon text-dark" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false"> Admin</i>
        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
        </ul>
       </div>           <!-- <i class="bi bi-cart4 nav1-icon "></i> -->
            
            <!-- <i class="bi bi-cart4 nav1-icon "></i> -->

       
           </div>
        </div>


        </nav>

           


</div>

  
        
    <h2 class="container AllProducts ">All Products </h2>


        <div class="products container row ">
        <?php
    
    include("config.php");
    $result = mysqli_query($conn, "SELECT * FROM products");    // mysqli_query ينفذ الاستعلام لاسترجاع كل المنتجات
    while($row =mysqli_fetch_array($result)){                   // mysqli_fetch_array    يستخرج كل صف من النتائج واحدًا تلو الآخر.
        echo "

        <div class='card product col-3 clo-xxl-3 col-xl-3 col-lg-3 col-sm-3  shadow' >
            <img class='card-img-top   product-image' src='$row[img]' >
            <div class='card-body'>
                <h5 class='card-title'> $row[name] </h5>
              
                    <div class='divpriceCategory'>
                    <p class='card-text'>$$row[price].00 </p>
                    <div class='Category'>$row[Category]</div>
                    </div>

                <a href='update-Admin.php? id=$row[id]' class='btn btn-secondary btnEditDel'  >Edit </a>
                <a href='deleteTowebiste-Admin.php? id=$row[id]' class='btn btn-danger btnEditDel'>Delete </a>
            </div>
            </div>
        
        ";
    }

    
    ?>
        </div>

 


   



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>