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
</head>
<body>  
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php include "./include/header.php" ?>
<?php
// Start or resume the session


// Retrieve the value from the query parameter
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Do any necessary session-related operations or use the value as needed
?>
<?php
 // get customer id from session
    
    $sql="SELECT * FROM `services` where Service_ID=$id";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
    			while( $record1 = mysqli_fetch_assoc($res) ) {          
  ?> 
<center><h1><?php echo $record1['Service_Name']; ?></h1></center> <?php }} ?>
<?php
    
    //$sql="SELECT  * FROM `provider` INNER JOIN `leaved` ON provider.Provider_ID=leaved.Provider_ID WHERE provider.Service_ID=$id and provider.Provider_ID=leaved.Provider_ID";
    $sql="SELECT * FROM `provider` where provider.Service_ID=$id";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
    			while( $record1 = mysqli_fetch_assoc($res) ) {          
  ?> 
<div class="providers">

<p><b>Provider Name:</b> <?php echo $record1['Provider_Name']; ?></p>
<div class="bt"><p><b>Address:</b> <?php echo $record1['Adress']; ?></p>
<?php if (isset($_SESSION['cust_id'])) {
    ?><button class="butt" id="<?php echo $record1['Provider_ID']; ?>" onclick="return booking(<?php echo $record1['Provider_ID'];?>)">Book</button><?php
} else {
    ?><a href="login.php"><button class="butt">Book</button></a>
    <?php
}
?></div>
<p><b>Phone no:</b><?php echo $record1['Contact']; ?></p>

</div><?php }} ?>
<?php $arr=array('09:00 AM','10:00 AM','11:00 AM','12:00 PM','01:00 PM','02:00 PM','03:00 PM','04:00 PM','05:00 PM','06:00 PM','07:00 PM'); ?>
</div>
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
        <input type="hidden" id="provider" name="provider">
        <label for="datetime">Select Date:</label>
  <input type="date" id="datetime" name="Date" required>
  <select name="Time">
<option value="">Select Time</option>
<?php
foreach($arr as $key => $value):
echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
endforeach;
?>
</select>
  <div id="error-message" class="error"></div>
        <label for="birthdaytime" id="date">Description about problem:</label>
        <input type="text" name="desc" id=""><br><br>
        <button type="submit" class="butt" name="sub">Book</button></center>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
   if (isset($_POST['sub'])) { 
    $id2= $_SESSION['cust_id'];
    $provider_id=$_POST['provider'];
    $datetime=$_POST['Date'];
    $description =$_POST['desc'];
    $time =$_POST['Time'];
   $sql2="INSERT INTO `booking` (`Provider_ID`, `Customer_ID`, `Date`, `Status`,`Desc`,`Time`) VALUES ('$provider_id', '$id2', '$datetime', 'Not Aproved','$description','$time')";
   $result=mysqli_query($conn,$sql2);?><div class="alert alert-success alert-dismissible mt-5 fade fixed-top show" >
   <Span>Appointment Book Successfully </Span> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
</div> <?php }}
    ?>
<?php include "./include/footer.php" ?>   
<script>
function booking(id){
     var id=id;
    document.getElementById("provider").value=id;
    
    $("#exampleModal").modal('toggle'); 
  }
      </script>
      <script>
    const dateTimeInput = document.getElementById('datetime');
    const errorMessage = document.getElementById('error-message');
//     var startDate = new Date("2024-04-01");
// var endDate = new Date("2024-04-15");
    dateTimeInput.addEventListener('change', (event) => {
      const selectedDate = new Date(event.target.value);
      const day = selectedDate.getDay(); // 0 - Sunday, 6 - Saturday

      // Check for Sunday
      if (day === 0) {
        errorMessage.textContent = 'Sundays are not available.';
        event.target.value = ''; // Clear the input value
        return;
      }

      // Check for time range (8:00 AM to 7:00 PM)
      // const selectedHours = selectedDate.getHours();
      // const selectedMinutes = selectedDate.getMinutes();

      // if (selectedHours < 8 || selectedHours > 19 || (selectedHours === 19 && selectedMinutes > 0)) {
      //   errorMessage.textContent = 'Time must be between 8:00 AM and 7:00 PM.';
      //   event.target.value = ''; // Clear the input value
      // } else {
      //   errorMessage.textContent = ''; // Clear any previous error message
      // }
      // if (selectedDate >= startDate && selectedDate <= endDate) {
      //     errorMessage.textContent ="These day providers on a leave.";
      //     event.target.value = ''
      //   } else {
      //     errorMessage.textContent =""
      //   }
      
    });
  </script>
  <script>
    // Get the current date and time
    var now = new Date();
    // Format the date to be compatible with input type datetime-local
    var formattedDate = now.toISOString().slice(0, 16);
    // Set the minimum value of the datetime input to the current date and time
    document.getElementById("datetime").min = formattedDate;
    </script>    
</script>       
</body>
</html>