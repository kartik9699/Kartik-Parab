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
    <?php include "./include/db.php"; ?>
    <?php $user_error=null;
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['Address'];
$mob=$_POST['phone'];
$pass=$_POST['pass'];
$pin=$_POST['pin'];
$city=$_POST['City'];
$services=$_POST['services'];
$Email_query="select * from provider where Email='$email'";
$res=mysqli_query($conn,$Email_query);
    if (mysqli_num_rows($res)>0) {
        $user_error="<p>email already registered</p>";    
}
    else{
        $sql="insert into provider(`Provider_Name`, `Contact`, `Password`, `Email`, `Adress`,`Service_ID`, `PinCode`,`City`) values('$name','$mob','$pass','$email','$address', '$services','$pin','$city')";
        $result=mysqli_query($conn,$sql);
        header("Location: index.php");
}}?>
  <div class="wrapper">
        <h3>PROVIDER REGISTRATION</h3>
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
                <select name="services" id="">
                    <?php
    $sql="SELECT * FROM `services`";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
    			while( $record1 = mysqli_fetch_assoc($res) ) {          
  ?> 
                    <option value="<?php echo $record1['Service_ID'];?>"><?php echo $record1['Service_Name']; ?></option> <?php }} ?>
                    
                </select>
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
    </div>
<script src="registraation.js"></script>    
  </body>
</html>

