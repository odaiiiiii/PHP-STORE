<?php
session_start();

//  isset(): هذه الدالة تتحقق مما إذا كان المتغير موجودًا ومحددًا (أي تم تعيينه بقيمة ما).


if (!isset($_SESSION['user_id'])) {
    // إذا لم يكن المستخدم مسجل الدخول، قم بإعادة توجيهه إلى صفحة تسجيل الدخول
    header("Location: loginPage.php");
    exit();
}

elseif(isset($_SESSION['email']) && $_SESSION['email'] !== 'admin@admin.com') {
    // إذا كان المستخدم مسجل الدخول ولكن مش مدير، قم بإعادة توجيهه إلى صفحة المنتجات
    header("Location: Product-User.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./files-css/AdminNav.css"> <!-- هنا تضيف رابط ملف CSS الخارجي -->
    <link rel="stylesheet" href="./files-css//admin.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
 
@media(max-width:992px ){
  .formSection{
    width: 80% !important;
    margin-bottom:5rem  ;
    padding: 1.8rem 0rem;

}
}
 
@media(max-width:767px ){
.formSection form div {
  width: 80% !important;
  margin: auto !important;
  margin-bottom: 1rem !important;
  
}
.productImage{
    width: 55%  !important;
    font-size: 10px !important;
}


.img-submit button{
  font-size: 10px !important;
}
}

@media(max-width:450px ){

  .productImage{
    width: 50%  !important;
}
.form-control{
  height: 30px !important;
}
.formSection form div label{
font-size: 13px !important;
font-weight: bold !important;
}

.formSection form div  select option,select{
  font-size: 13px !important;

}

.img-submit{
  display: block !important;
  
}

.img-submit .productImage{
  display: flex !important;
  margin-bottom: 1.2rem ;
  width:100% !important ;
} 


.img-submit button{
  width:100% !important ;
  font-size: 14px  !important;
}
}



</style>

    <!-- NAV  -->

    <div class="navbar1 container  shadow-sm ">

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
                        <a  href="#" id="navbarDropdownMenuLink2" role="button" aria-expanded="false" class="hide">
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
            

       
           </div>
        </div>


        </nav>

           


</div>

  

 

    <div  class="container formMain">
    <h2>Add a new product</h2>
    
        <div class="formSection shadow-sm rounded container">
        
        <form  method="post" enctype="multipart/form-data" action="insertTowebsite-Admin.php">
  <div class="mb-4    ">
    <label for="productName" class="form-label">Prduct Name</label>
    <input type="text" class="form-control" id="productName"  name="productName">

  </div>
        <div class="mb-4">
        <label for="productCategory" class="form-label">Product Category</label>
        <select class="form-control" id="productCategory" name="productCategory" >
            <option value="Mobile"> Mobile</option>
            <option value="Computers">Computers </option>
            <option value="Cameras">Cameras </option>
            <option value="Others">Others </option>

        </select>
</div>

  <div class="mb-4">
    <label for="productPrice" class="form-label">Prduct Price</label>
    <input type="number" step="0.1" class="form-control" id="productPrice"  name="productPrice">

  </div>

  <div class="mb-4 ">
    <label for="" class="form-label"> Product Image</label>
 
        <div class="img-submit">
        <input type="file" class="form-control productImage" id="productImage"  name="productImage" >
        <button type="submit" class="btn btn-success" name="submitProduct"  id="submitProduct"> Add product</button>

        </div>
 
  </div>


</form>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
