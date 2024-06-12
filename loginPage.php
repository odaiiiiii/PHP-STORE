<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if($_SESSION['email'] == 'admin@admin.com'){
        header("Location: Admin.php");
        exit();
    }
    header("Location: Product-User.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./files-css/tec2.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
<title>Login</title>
</head>
<body>
<style>
*{
   font-family: "Caveat", cursive;
}
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
    margin: auto !important;
    justify-content: center !important;
}
</style>
<div class="container formMain">
    <h2>Login Page</h2>
    <div class="formSection shadow-sm rounded container">
        <form action="CnnectLogin.php" method="post">
            <div class="mb-4">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password:</label>
                <input type="password" name="pass" class="form-control" required>
            </div>
            <div class="divBtn">
                <button type="submit" class="btn btn-success" name="btnLogin" id="btnLogin">Log in</button>
                <a href="register.php">Create a new account</a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
