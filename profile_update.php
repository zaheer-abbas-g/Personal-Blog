<?php
   

      include("connection/connection.php");
      include_once("sessionMentainance.php");

          /*Admin Update Profile*/ 

          $user_id=isset($_SESSION['admin']['user_id'])?$_SESSION['admin']['user_id']:"";
      if (isset($_REQUEST['update_profile'])) {
          extract($_REQUEST);
          date_default_timezone_set("Asia/Karachi");
          $updated = date('Y-m-d H:i:s');
          $query="UPDATE user SET first_name='$ufirst_name',last_name='$ulast_name',email='$uemail',date_of_birth='$udate_of_birth',address='$uaddress',updated_at='$updated' WHERE user_id='$user_id'";
            mysqli_query($connect, $query);
          $image=$_FILES['image']['name'];
          $image_size=$_FILES['image']['size'];
          $image_tmp_name=$_FILES['image']['tmp_name'];
          $upload_image='upload_image/'.$image; 

          if(!empty($image)){
          if ($image_size> 1048576) {
               
               $msg="Image  size must be 1MB";
          }
          else{

            $query="UPDATE user SET user_image='$image' WHERE user_id='$user_id'";
            $result=mysqli_query($connect,$query);
            if ($result) {
             move_uploaded_file($image_tmp_name, $upload_image); 
            }
            $message="Profile upadated Successfully";
          }
         }
            $message="Profile upadated Successfully";
      }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> profile Update</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   

</head>
<body style="background-color:#717482">
   
<div class="update-profile">

   <?php
      $select = mysqli_query($connect, "SELECT * FROM user WHERE user_id = '$user_id' and role_id=1") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
        <h3 style="color:green;"> <?php echo isset($message)?($message):""; ?> </h3>
        <h3 style="color:red;"> <?php echo isset($msg)?($msg):""; ?> </h3>
      <?php
         if(isset($fetch['role_id'])==1){
            ?>
            <img style="border-radius:50%; height: 200px; width: 200px" src="<?php echo 'images/'.$fetch['user_image'];?>">
            <?php
         }
         else{
            ?>
            <img height="50px" src="images/default-avatar.png">
            <?php
         }
       
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>First Name :</span>
            <input type="text" name="ufirst_name" value="<?php echo isset($fetch['first_name'])?$fetch['first_name']:""; ?>" class="box"> 
            <span> Upload Image :</span>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
            <span>Date OF Birth :</span>
            <input type="date" name="udate_of_birth" value="<?php echo isset($fetch['date_of_birth'])?$fetch['date_of_birth']:""; ?>" class="box">
              
           </div>
         <div class="inputBox">
               <span>Last Name :</span>
            <input type="text" name="ulast_name" value="<?php echo isset($fetch['last_name'])?$fetch['last_name']:""; ?>" class="box">
              <span>Email :</span>
            <input type="email" name="uemail" value="<?php echo isset($fetch['email'])?$fetch['email']:""; ?>" class="box">
              <span>Address:</span>
            <input type="text" name="uaddress"value="<?php echo isset($fetch['address'])?$fetch['address']:""?>" placeholder="enter address" class="box"> 
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>