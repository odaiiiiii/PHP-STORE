
<?php 


    session_start();

    if (!isset($_SESSION['user_id'])) {
        // إذا لم يكن المستخدم مسجل الدخول، قم بإعادة توجيهه إلى صفحة تسجيل الدخول
        header("Location: loginPage.php");
        exit();
    }

    elseif(isset($_SESSION['email']) && $_SESSION['email'] !== 'admin@admin.com') {
        // إذا كان المستخدم مسجل الدخول ولكن ليس مديرًا، قم بإعادة توجيهه إلى صفحة المنتجات
        header("Location: Product-User.php");
        exit();
    }


    include ("config.php")  ;
    $ID = $_GET['id'];
    $UPDATE = mysqli_query($conn , "SELECT * FROM products WHERE id= $ID");
    $DATA = mysqli_fetch_array($UPDATE);
    
    ?>


<!DOCTYPE html>
<html lang="ar">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./files-css/tec2.css">
        <link rel="stylesheet" href="./files-css/AdminNav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./files-css//admin.css">

    <title>Edit Product</title>
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

@media(max-width:992px){
    
    .img-submit{
      display: block !important;
      width: 80% ;
      margin: auto;
      
    }
    
    .img-submit .productImage{
      display: flex !important;
      margin-bottom: 1.8rem !important ;
      width:100% !important ;
    
    } 
    
    
    .img-submit button{
      width:80% !important ;
      display: flex;
    
      justify-content: center !important;
      margin: auto !important;
      font-size: 14px  !important;
    }


    .formSection{
    background-color: white ;
    width: 80% !important;
  
}
form{
    width: 100%;

}

 .form-label{
    width: 80% !important;
  display: flex !important;
  margin: auto !important;
  padding-bottom: .5rem;
  font-size: 15px;
}

 .form-control{
 
    width: 80% !important;
    display: flex ;
    margin: auto !important;
    height: 30px;
    font-size: 10px;
}
    
    }

@media(max-width:767px){
    
.formSection{
    background-color: white ;
    width: 80% !important;
  
}
form{
    width: 100%;

}

 .form-label{
    width: 80% !important;
  display: flex !important;
  margin: auto !important;
  padding-bottom: .5rem;
  font-size: 15px;
}

 .form-control{
 
    width: 80% !important;
    display: flex ;
    margin: auto !important;
    height: 30px;
    font-size: 10px;
}
.formMain h2{
    margin-top: 3rem !important;
}
}
 


  
</style>

    <!-- NAV  -->

     <!-- NAV  -->

     <div class="navbar1 container shadow-sm  ">

<nav class="navbar  navbar-light   divNav row  ">

   
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
                Login
                </a>
               
            </li>
        </ul> 
    </div>


</div>


<div class="nav3 col-2">

<div class="dropdown">
            <i class="bi bi-person-circle nav1-icon text-dark" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false"> Admin</i>
            <ul class="dropdown-menu" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
            </ul>
          </div>    
</div>


</nav>

   


</div>


    <div  class="container formMain ">
    <h2>Edit product</h2>
    
        <div class="formSection shadow-sm rounded container">
        
        <form  method="post" enctype="multipart/form-data" action="upload-Admin.php">
        <div class="mb-4   ">
    <label for="productId" class="form-label"  >Id </label>
    <input type="number" class="form-control" id="productId" name="productId" value='<?php echo $DATA['id']; ?>' readonly>
    <input type="hidden" id="hiddenProductId" name="productId" value='<?php echo $DATA['id']; ?>'>

  </div>
  <div class="mb-4    ">
    <label for="productName" class="form-label">Edit product name</label>
    <input type="text" class="form-control" id="productName"  name="productName"      value='<?php  echo $DATA['name']  ;?>' >

  </div>
        <div class="mb-4">
        <label for="productCategory" class="form-label">Edit product Category</label>
        <select class="form-control" id="productCategory" name="productCategory"   >
            <option value="Mobile"> Mobile</option>
            <option value="Computers">Computers </option>
            <option value="Cameras">Cameras </option>
            <option value="Others">Others </option>

        </select>
</div>

  <div class="mb-4">
    <label for="productPrice" class="form-label">Edit product Price</label>
    <input type="number" step="0.1" class="form-control" id="productPrice"  name="productPrice"   value="<?php  echo $DATA['price'] ?>">

  </div>

  <div class="mb-4 ">
        <label for="" class="form-label">Edit product Image</label>
 
        <div class="img-submit">
        <input type="file" class="form-control productImage" id="productImage"  name="productImage"  value="<?php  echo $DATA['img'] ?>"  >
        <button type="submit" class="btn btn-success" name="editProduct"  id="editProduct"> Edit Product</button>

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
