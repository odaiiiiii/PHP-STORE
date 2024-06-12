

<?php 

include("config.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    // إذا لم يكن المستخدم مسجل الدخول، قم بإعادة توجيهه إلى صفحة تسجيل الدخول
    header("Location: loginPage.php");
    exit();
}


 
$ID = $_GET["id"];
$INSERT = mysqli_query($conn, "SELECT * FROM  products  where id=$ID" );
$DATA = mysqli_fetch_array($INSERT);



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./files-css//products4.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <title>Confirm the Addition </title>
</head>
<body>


<style>
 
 *{
   font-family: "Caveat", cursive;
}
   
 .confirmDiv{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40%;
    margin-top: 4rem;
    padding: 25px 10px;
    background-color: whitesmoke;
 }

 .confirmDiv form input {
    display: none;
 }
 .confirmDiv form button{
    width: 40%;
    margin: 1rem 0rem;

 }

 .confirmDiv form a{
    color: blue;
    font-weight: bold;  
    font-size: 15px;
 }

 @media(max-width:992px){
    .confirmDiv{
    width:65%;
    margin-top: 6rem;
    padding: 25px 55px !important;
 }

 }

 @media(max-width:828px){
    .confirmDiv{
    width: 60%;
    margin-top: 6rem;
    padding: 25px 55px !important;
 }
 .confirmDiv form h2{
    font-size: 25px;
 }
 }

 @media(max-width:720px){
    .confirmDiv{
    width: 70%;
    padding: 25px 20px;
 }

}
@media(max-width:600px){
    .confirmDiv{
    width: 70%;
    padding: 25px 10px !important;
 }
   
 .confirmDiv form button{
    width: 50%;
    font-size: 13px !important;

 }

 .confirmDiv form a{
    font-size: 11px;
 }
 .confirmDiv form h2{
    font-size: 20px;
 }
}

@media(max-width:500px){
    .confirmDiv{
    width: 90%;
    padding: 25px 10px !important;
 }
}

 
</style>


    <div class="container confirmDiv shadow">
      

        <form action="insertToCart-user.php" method="post">
        <h2>Are you sure to buy the product?</h2>
        <input type="number" name="idPro" value="<?php echo $DATA['id'] ?>" >
        <input type="text" name="namePro" value="<?php echo $DATA['name'] ?>">
        <input type="text" name="pricePro" value="<?php echo $DATA['price']  ?>">


       <div class="divBtnA">
       <button name="btnAdd" type="submit" class="btn btn-success" > YES, I am sure</button>
       <br>
        <a href="Product-User.php">Cancel, return to product page</a>
       </div>




        </form>

              
      



    </div>


    
</body>
</html>


<?php 
include("config.php");

if(isset($_POST['btnAdd'])){
    $NAME = $_POST['namePro'];
    $PRICE = $_POST['pricePro'];
    $USER_ID = $_POST['userId'];

    $INSERT =  "INSERT INTO `cart-user` (name, price, user_id) VALUES ('$NAME', '$PRICE', '$USER_ID')";
    mysqli_query($conn, $INSERT);
    header("Location: CartPage-User.php");
}
?>



