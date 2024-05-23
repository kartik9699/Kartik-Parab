<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"></link>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <?php include "./include/header.php"; ?>
    <div id="wrapper">
        <h1>Your Bookings</h1>
        
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
    $sql="SELECT * FROM `booking` inner join `provider` where booking.Provider_ID=provider.Provider_ID and booking.Customer_ID=$id ";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
    			while( $record1 = mysqli_fetch_assoc($res) ) {          
  ?> 
            <tr>
              <td class="lalign"><?php echo  $record1["Provider_Name"] ?></td>
              <td><?php echo  $record1["Adress"] ?></td>
              <td><?php echo  $record1["Contact"] ?></td>
              <td><?php echo  $record1["Date"] ?></td>
              <td><?php echo  $record1["Time"] ?></td>
              <td><p><?php echo  $record1["Status"] ?></p></td>
            </tr><?php }}?>
          </tbody>
        </table>
       </div> <?php
//        if($_SERVER['REQUEST_METHOD']=='POST'){
//    if (isset($_POST['update'])) { 
    
//     $book_id=$_POST['book_id'];
    
//    $sql2="UPDATE `booking` SET `Status` = 'complete' WHERE `booking`.`Booking_id` = $book_id";
//    $result=mysqli_query($conn,$sql2);}}?>
    
    <?php include "./include/footer.php"; ?>
</body>
</html>