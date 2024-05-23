<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"></link>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/table.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    
</head>
<body>
    <?php include "./provider/header.php"; ?><br><br>
    <?php $provider_id2=$_SESSION['cust_id'];?>
    <!-- <button id="<?php //echo $record1['Provider_ID']; ?>" class="leave" onclick="return leave()" style="background-color:red; height: 30px; width: 50px;">Leave</button> -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">BOOKING</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="myform" action="" method="post" enctype="multipart/form-data">
        <center>
        <input type="hidden" id="provider" name="provider" value="<?php echo $provider_id2; ?>">
        <label for="datetime">From:</label>
  <input type="date" id="FromDate" name="FromDate" required>
  <div id="error-message" class="error"></div><br><br>
  <label for="datetime">to:</label>
  <input type="date" id="ToDate" name="ToDate" required><br><br>
        <button type="submit" class="butt" name="sub">Leave</button></center>
        </form>
      </div>
    </div>
  </div>
</div>
    <div id="wrapper">
        <h1>Works</h1>
        
        <table id="keywords" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th><span>Name</span></th>
              <th><span>Address</span></th>
              <th><span>Contact</span></th>
              <th><span>Date</span></th>
              <th><span>Time</span></th>
              <th><span>Status</span></th>
            </tr>
          </thead>
          <tbody>
          <?php
    $id=$_SESSION['cust_id'];
    $sql="SELECT * FROM `booking` inner join customer where booking.Customer_ID=customer.Customer_ID and booking.Provider_ID=$id ";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
    			while( $record1 = mysqli_fetch_assoc($res) ) {          
  ?> 
            <tr>
              <td class="lalign"><?php echo  $record1["Customer_Name"] ?></td>
              <td><?php echo  $record1["Customer_Adress"] ?></td>
              <td><?php echo  $record1["Customer_Contact"] ?></td>
              <td><?php echo  $record1["Date"] ?></td>
              <td><?php echo  $record1["Time"] ?></td>
              <td><form name="myform" action="" method="post" enctype="multipart/form-data"><input type="hidden" name="book_id" value="<?php echo  $record1["Booking_id"] ?>"><button type="submit" name="update" class="butt"><?php echo  $record1["Status"] ?></button></form></td>
            </tr><?php }}?>
          </tbody>
        </table>
       </div> 
       <?php
       if($_SERVER['REQUEST_METHOD']=='POST'){
   if (isset($_POST['update'])) { 
    
    $book_id=$_POST['book_id'];
    
   $sql2="UPDATE `booking` SET `Status` = 'Aproved' WHERE `booking`.`Booking_id` = $book_id";
   $result=mysqli_query($conn,$sql2);}}?>
   <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
   if (isset($_POST['sub'])) { 
    
    $Fromdate=$_POST['FromDate'];
    $Todate=$_POST['ToDate'];
    
   $sql2="INSERT INTO `leaved` (`Fromleave`, `toleave`, `Provider_ID`) VALUES ('$Todate', '$Fromdate', '$id')";
   $result=mysqli_query($conn,$sql2);}}
    ?>
    
    <?php include "./include/footer.php"; ?>
    <script>
    function leave(){
    //  var id=id;
    // document.getElementById("provider").value=id;
    
    $("#exampleModal").modal('toggle'); 
  }</script>
</body>
</html>