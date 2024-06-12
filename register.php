<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="./files-css/tec0.css"> <!-- هنا تضيف رابط ملف CSS الخارجي -->



<title>Register </title>
</head>
<body>
   

   <?php  

   include('config.php');
   
   ?>


<style>

*{
   font-family: "Caveat", cursive;
}
   
/* FormSection*/

@media(max-width:992px){
      .formSection{
    width: 80% !important;
 
}

.formMain h2{
margin-top: 2rem;
}
}


@media(max-width:767px){
   .formSection{
    width: 100% !important;
 
}
 form{
   width: 75% !important;
}

}


.divBtn {
   display: flex !important;
   flex-direction: column;
}

form button{
   width:50% !important;
   display: flex !important;
   margin: auto !important;
   justify-content: center !important;
   margin-bottom: 1rem !important;
}

form a{
display: flex !important ;
margin:  auto !important;
justify-content:  center !important;
}

</style>

<div  class="container formMain ">
<h2>Register Page</h2>

    <div class="formSection shadow-sm rounded container">

    <form class="formReg" action="Connectregister.php" method="post">
       

        <div class="mb-4   ">
            <label  class="form-label"> Name : </label>
            <input type="text" name="name" class="form-control" required  >

         </div>

         <div class="mb-4    ">
            <label  class="form-label"> User Name : </label>
            <input type="text" name="userName" class="form-control" required >

         </div>

         <div class="mb-4    ">
            <label  class="form-label"> Email : </label>
            <input type="email" name="email" class="form-control" required >

         </div>
 
         <div class="mb-4    "> 
            <label  class="form-label"> Password : </label>
            <input type="password" name="pass" class="form-control"  required>

         </div>

         <div class="divBtn">
         <button type="submit" class="btn btn-success" name="btnRegister"  id="submitProduct"> Register</button>
      
         <a href="loginPage.php"> Go to the login page<a>

        </div>

       
    </form>

    
    </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>