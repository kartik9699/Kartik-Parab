
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">  
</head>
<?php session_start(); ?>
<body>
  <?php require './include/db.php'; ?>
<?php
$user_error=null;
if($_SERVER['REQUEST_METHOD']=='POST'){
$email=$_POST['email'];
$pass=$_POST['password'];

// Check connection
if (!$conn) {
}else{
    $sql="select * from customer where Customer_Email= '$email'";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
        $data=$res->fetch_assoc();
        if($data['password']===$pass){
          header("Location:index.php");
          $_SESSION['cust_id']=$data['Customer_ID'];
          $_SESSION['cust_name']=$data['Customer_name'];
          
        }
        else{  
           $user_error="invalid password ";    
        }
    }else{      
           $user_error="invalid Email";   
    }
}}
?>
    <div class="wrapper">
        <form name="myform" onsubmit="return login ()" action="" method="post">
            <div class="single-div">
              <input type="email" name="email" id="email" required="">
              <label>Your Email</label>
              <span id="mail"></span>
            </div>
            <div class="single-div">
              <input type="password" name="password" id="password" required="" >
              <label>Your Password</label>
              <span id="error"><?php echo $user_error ; ?></span>
            </div>
            <div class="sub">
              <button>Submit</button>
            </div>
            <a href="Registration.php">Register as Customer? </a><br>
            <a href="Provider_reg.php">Register as Provider?</a><br>
            <a href="Provider_login.php">Login as Provider?</a>
        </form>    
    </div>
</body>
<script src="login.js"></script>
</html>
