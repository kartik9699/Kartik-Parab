<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css"></link>  
</head>
<body>
<?php include "./include/session.php" ?>
  <?php include "./include/db.php" ?>
  <div class="navbar">
        
    <a href="index.php"class="logo">home Services</a> 
    <a href="aboutus.php">About Us</a>  
    <a href="contactus.php">Contact Us</a>
    <!-- <form action=""  method="get"> -->
    <!-- <a href="servces.php?id=<?php //echo $record1['Service_ID'];?>">
<select name=""  id="second-service"> -->

<?php
//$sql03="SELECT * FROM `services`";
//$res3=mysqli_query($conn,$sql03);
//if($res3->num_rows>0){
      //while( $record = mysqli_fetch_assoc($res3) ) {          
?>  
        <!-- <option value="<?php //echo $record['Service_ID']; ?>"> <?php //echo $record['Service_Name']; ?>  </option>   <?php  //} } ?>  -->
        <!-- <option value="">Plumber</option>
        <option value="">Cleaning</option>
        <option value="">Electrician</option>
        <option value="">HOME APPLIANCES REPAIR</option>
        <option value="">PEST CONTROL</option> -->
        <!-- </select> </a> -->
          <!-- <a href="login.php" class="login">LOGOUT</a>
        <a href="Registration.php" class="login">PROFILE</a></form> -->
        <?php
// Check if the user is logged in (you can replace this with your actual login check logic)


if (isset($_SESSION['cust_id'])) {
    ?><a href="Bookings.php">Your Bookings</a>
    <a href="profile.php">Profile</a>
    <a href="logout.php" class="login">Logout</a>
    <?php
} else {
    ?><a href="login.php" class="login">Login</a>
    <a href="Registration.php" class="login">Register</a>
    <?php
}
?>

      

 <!-- <a href="login.php" class="login">LOG IN</a>
        <a href="Registration.php" class="login">REGISTER</a>  
        <a href="logout.php" class="login">LOGOUT</a>
        <a href="Registration.php" class="login">PROFILE</a>       -->
       
    
 </div>
 

</body>
</html>