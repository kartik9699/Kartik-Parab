<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User registration page</title>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  </head>  
  <body>
    <?php require './include/db.php'; ?>
    <?php $user_error=null;
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['Address'];
$mob=$_POST['phone'];
$pass=$_POST['pass'];
$pin=$_POST['pin'];
$city=$_POST['City'];

$Email_query="select * from customer where Customer_Email='$email'";
$res=mysqli_query($conn,$Email_query);
    if (mysqli_num_rows($res)>0) {
        $user_error="<p>email already registered</p>";    
}
    else{
        $sql="insert into `customer` ( `Customer_Name`, `Customer_Adress`, `Customer_City`, `Customer_Contact`, `Customer_Email`, `Customer_PinCode`,`password`) values('$name','$address','$city','$mob','$email','$pin','$pass')";
        $result=mysqli_query($conn,$sql);
        header("Location: index.php");
}}
//require ('register.php'); ?>
  <div class="wrapper">
        <h3>REGISTRATION</h3>
        <form name="myform" onsubmit="return myscript()" action=""   method="post">
            <div class="single-div">
                <input type="text" name="name" id="name" pattern="[A-Za-z\s]{3,}" required=""/>
                <label> Name: </label>
            </div>
            <div class="single-div">
                <input type="number" name="phone" id="phone" required="" />
                <label>Phone:</label>
                <br>
            </div>
            <div class="single-div">
                <input type="text" name="Address" required="" />
                <label> Address:</label>
            </div>
            <div class="single-div">
                <input type="text" id="email" name="email" required="" />
                <label>Email:</label> <br>
            </div>
            <div class="single-div">
                <input type="number" id="Pin" name="pin" required=""/>
                <label>PinCode</label>
            </div>
            <div class="single-div">
                <input type="text" id="City" name="City" required="">
                <label>City</label>
            </div>
            
            <div class="single-div">
                <input type="Password" id="pass" name="pass" required="" /> <label> Password:</label>
            </div>
            <div class="single-div">
                <input type="Password" id="repass" name="repass" required="" /> <label>Re-type password:</label><span id="error">
                <?php echo $user_error;?>
                </span>
            </div>
            <div><button>Submit</button>
            </div>
        </form>  
        <a href="Provider_reg.php">register as providers</a>      
    </div>
<script src="registraation.js"></script>    
  </body>
</html>

