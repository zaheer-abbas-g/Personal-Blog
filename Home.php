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
   
         <!--  Add bootstrap css link  -->
       
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!-- js link -->
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 

     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>

           <!-- add fontawesome link -->
  <link rel="stylesheet" href="fontawesome/css/all.css">




<?php include("navbar/nav.php");?> 
 <?php include("sidebar/index.php"); ?>
  
     <title>Home</title>
</head>
<style>
body{
            background-image:url("images/background1.jpg");
            background-position:center;
            background-repeat: no-repeat;
            background-size: cover;
    }
.card-container{
            display: flex;
            justify-content : space-around;
            text-align: center;
            margin : 20px;
                }
.card{

            width: 10%;
            height: 500px;
            
            border-radius: 10px;
            box-sizing: border-box;
            box-shadow: 8px 5px 25px blue;
    } 
 #user{
            width: 40%;
            height: 40%;
            border: 1px solid red;
            border-radius: 50%;
            background-color: gray;
            color: white;
            box-shadow: 10px 10px 30px gray;
            margin-top: 20%;
     }
           .card-group{
            margin-top: -52%;
            width: 80%;
            height: 50%;
            margin-left: 23%;
           }

</style>
<body>

  <div class="container mt-5">
    <div class="row" class="col-sm-12">
  <div class="card-group">
  <div class="card m-3 h-25" style="border-radius: 10px;">
    <center style="background-color: none">
      <i class='fas fa-comment-dots' style="font-size:80px;color:gold;background-color: white;"></i>
    </center>
    <div class="card-body" style="background-color: lightgray;border-radius: 10px">
      <a style="text-decoration:none; color: black;" href="comments.php"><h5 class="card-title" align="center">Comments
      
       <?php 
  $query="SELECT comments FROM user_post_comment";
  $result0=mysqli_query($connect,$query);
  $count_row=mysqli_num_rows($result0);
  echo "(".$count_row.")";
       ?>
         
       </h5>
      </a>
    </div>
   </div>
  
  <div class="card m-3 h-25" style="border-radius: 10px;">
<center>
  <i class='fas fa-users' style='font-size:80px;color:gold;background-color: white;'></i>
</center>
  <div class="card-body" style="background-color: lightgray;border-radius: 10px">
      <a style="text-decoration:none; color: black;" href="view_all_users.php"><h5 class="card-title" align="center">Users 
        <?php
        $qr="SELECT * FROM user";
        $qe_result=mysqli_query($connect,$qr);
        $rows_count2=mysqli_num_rows($qe_result);
        echo "(".$rows_count2.")"; 
         ?> 
      </h5> </a>
    </div>
   </div>

<div class="card m-3 h-25" style="border-radius: 10px;">
<center>
   <i class='fas fa-star' style='font-size:80px;color:gold;background-color: white'></i>
</center>
    <div class="card-body" style="background-color: lightgray;border-radius: 10px">
      <a style="text-decoration:none; color: black;" href="feedback.php"><h5 class="   card-title" align="center">Feedback
       <?php
        $q="SELECT feedback FROM user_feedback";
        $q_result=mysqli_query($connect,$q);
        $rows_count=mysqli_num_rows($q_result);
        echo "(".$rows_count.")"; 
         ?></h5> 
      </a>
    </div>
  </div>


  <div class="card m-3 h-25" style="border-radius: 10px;">
<center>
   <i class='fas fa-bell' style='font-size:80px;color:gold;background-color: white'></i>
</center>
    <div class="card-body" style="background-color: lightgray;border-radius: 10px">
      <a style="text-decoration:none; color: black;" href="follower.php"><h5 class="   card-title" align="center">Followers
<?php
        $qy="SELECT follow_id FROM user_blog_following";
        $qui_result=mysqli_query($connect,$qy);
        $rows_countn=mysqli_num_rows($qui_result);
        echo "(".$rows_countn.")"; 
?>
      </h5> 
      </a>
    </div>
  </div>

</div>
</div>
</div>
</body>
<?php include("headr/footer.php") ?>
</html>