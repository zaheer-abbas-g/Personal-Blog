<?php  
        

        include("connection/connection.php");
        include_once("sessionMentainance.php");

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
   <!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
       
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>
        <!--  Add  fontawesome  link  -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    label{
            padding-right: 20%;
            margin-top: 2%;
            color: black;
            font-weight: normal;
    }
   
    .card{
            width: 30%;
            height: 50%;
            height: 100px;    
            border-radius: 10px;
            box-sizing: border-box;
            box-shadow: 3px 3px 25px cadetblue;
      }

      .imag{

            width: 40%;
            border-radius: 50%;
      }
      .container{
            margin-top: 30%;
            
      }

</style>
</head>
<body style="background-color:#717482">

<?php include("navbar/nav.php");?> 
<?php include("sidebar/index.php"); ?>
	
<center>
<div style="margin-top: -40%;margin-bottom: 36%;margin-left: 20%;">  
  <div class="card m-3 h-25" style="border-radius: 10px;">
  <div class="card-body" style="background-color: lightgray;border-radius: 10px;w">
      <?php
         $user_id=$_SESSION['admin']['user_id'];
         $select = mysqli_query($connect, "SELECT * FROM user WHERE  user_id = '$user_id'  && role_id=1") or die('query failed');
         if(mysqli_num_rows($select) > 0){ 
            $fetch = mysqli_fetch_assoc($select);
            }
            if(isset($fetch['role_id'])==1){
            ?>
            <img  class="imag"  style="border-radius:50%; height: 200px; width: 200px" src="<?php echo 'images/'.$fetch['user_image'];?>">
      <h3><?php echo isset($fetch['first_name'])?$fetch['first_name']:''." "/*.isset($fetch['last_name'])?$fetch['last_name']:""*/; ?></h3>
            <?php
         }
         else{
            ?>
            <img  class="imag" src="images/default-avatar.png">
            <?php
         }?>             
      <a  href="profile_update.php" class="btn btn-primary w-75" >update profile</a>
 </div> 
</div> 
</div>
<center>


<?php  include("headr/footer.php");?>
</body>
</html> 