




<?php 


    include('config.php');
     

        $ID = $_GET['id'];

        $DELETE = "DELETE FROM `cart-user` WHERE id=$ID";
        mysqli_query($conn,$DELETE);


        header("location: CartPage-User.php");



    




?>