 <?php

error_reporting(0);
session_start();
/*if (!isset($_SESSION['admin'])) {
    header("location:login.php?msgg=please login first");
}
*/   
include("connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Navbar</title>
<!--  Add bootstrap css link  -->

   <!-- add fontawesome link -->
        <link rel="stylesheet" href="fontawesome/css/all.css">


          <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

        <style>    
          .img{
            width: 70px;
            height: 70px;
            border-radius: 50%;

          }

         </style> 

  
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color:lightgray;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color:black"><img src="images/logo.png" height="40px" > Online Blog Application
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <!-- <li class="nav-item">
          <a class="nav-link" href="#" style="color:black;margin-top: -3%; font-size: 20px;">Blogs</a>
        </li>
 -->
      <?php  if (!(isset($_SESSION['admin']['role_id'])==1)) { ?>

          <li class="nav-item" style="list-style: none;">
          <a class="nav-link active" aria-current="page" href="index.php"  style="color:black;margin-top: -4%; font-size: 20px;">Home</a>
        </li>


    <li class="nav-item dropdown" style="list-style: none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;margin-top: -2%; font-size: 20px;">
         Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php 

          if(isset($_GET['cid'])){
            $cid=$_GET['cid'];
          }
            

            $select = "SELECT * FROM category";
            $result = mysqli_query($connect,$select);
            if (mysqli_num_rows($result)) {
             $active = " ";  
              while ($row = mysqli_fetch_assoc($result)) {

                if(isset($_GET['cid'])){
                if ($row['category_id'] == $cid) {
                $active = "active";
                }
                else{
                   $active = " ";
                }
               }   
              if ($row['category_status']=='Active') {
                ?>
          <a class="dropdown-item" class= "{$active}" href="category.php?cid=<?php echo $row['category_id'];?>"><?php echo $row['category_title'];?></a>

         <!--  <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
          <?php
        }} } 
      ?>
        </div>
      </li>


       
        <li class="nav-item">
          <a class="nav-link" href="about_us.php" style="color:black;margin-top: -3%; font-size: 20px;">About Us</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="contact_us.php" style="color:black;margin-top: -3%; font-size: 20px;">Contect Us</a>
        </li>
          </ul> 

  
    
      
      <?php   
      }  
       if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
                
        $user_id=isset($_SESSION['user']['user_id'])?$_SESSION['user']['user_id']:'';
        $user_id=isset($_SESSION['admin']['user_id'])?$_SESSION['admin']['user_id']:'';
         $select = mysqli_query($connect, "SELECT * FROM user WHERE  user_id = '$user_id' ") or die('query failed');
         if(mysqli_num_rows($select) > 0){ 
            $fetch = mysqli_fetch_assoc($select);
            }
            if(isset($_SESSION['user']['role_id'])==2){
            ?>
           <a href="user_profile_update.php?user_side_profile=<?php  echo $_SESSION['user']['user_id'];?>"> <img  class="img"  style="border-radius:50%; height: 50px; width: 50px" src="<?php echo 'images/'.$_SESSION['user']['user_image'];?>"></a>
        
            <?php
         }
        
          else if(isset($_SESSION['admin']['role_id'])==1){
            ?>
          <img  class="img"  style="border-radius:50%; height: 50px; width: 50px;margin-left: 1200px" src="<?php echo 'images/'.$fetch['user_image'];?>">
    
            <?php
         }

         else{?>
           <img  class="img" src="images/default-avatar.png" height="40px" width="50px">
    
               <?php
         }             
        }

           else{
        ?>


         <span class="navbar-text">
          <a href="login.php" style="text-decoration:none;color: black;">
          <i class='fas fa-user-alt' style="color:black"></i> Login&nbsp;
          </a>
          <span style="color: black;"> |</span>
          <a href="register.php" style="text-decoration:none;color: black;"> 
          <i class='fas fa-user-plus' style="color:black;"></i> Register
          </a>
        </span>    
      <?php } ?>
    </div>
  </div>
</nav>

  
  <script type="text/javascript">
      
      function dropdown(){
        document.getElementById("dropdownMenuButton").style.display="block";
          //var x=document.getElementById('dropdownMenuButton');
      }

  </script>

</body>
</html>