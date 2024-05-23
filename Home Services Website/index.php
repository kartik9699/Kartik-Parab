<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css"></link>    
</head>
<body>

     <?php include "./include/header.php"; 
     
     ?>
    <div class="template">
        <p id="tagline">SERVICES <br>find a near by home services</p>
    </div>
    <div id="box"><?php
    
    $sql="SELECT * FROM `services`";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
    			while( $record1 = mysqli_fetch_assoc($res) ) {          
  ?> 
    <div id="services"> <a href="servces.php?id=<?php echo $record1['Service_ID'];?>" id=""> <?php echo $record1['Service_Name']; ?> </a> <input type="hidden" name="services1" value="<?php $record1['Service_ID']; ?> ">  
    </div><?php } } ?>
    </div>    
    <?php include "./include/footer.php"; ?>
</body>
</html>