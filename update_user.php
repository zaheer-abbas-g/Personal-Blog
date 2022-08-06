<?php 
          include('connection/connection.php');
          include_once("sessionMentainance.php");

          /*Update Users*/
          if (isset($_REQUEST['update'])) {
             $user_id=$_REQUEST['update_user'];
              $gender=isset($_REQUEST['gender'])?$_REQUEST['gender']:"";
              extract($_REQUEST);
                date_default_timezone_set("Asia/Karachi");
               $updated = date('Y-m-d H:i:s');
              $update="UPDATE user SET first_name='$first_name',last_name='$last_name',email='$email',gender='$gender',date_of_birth='$date_of_birth',updated_at='$updated' WHERE user_id=$user_id";
              $result=mysqli_query($connect,$update);
              if ($result) {
                  header("location:view_all_users.php?message=user successfully updated");

              }

          }


          /*Change Role of User*/

          if (isset($_REQUEST['role_id'])) {
              
              $user_id=$_REQUEST['role_id'];

              $query=mysqli_query($connect,"SELECT * FROM user WHERE user_id='$user_id'");
              $row=mysqli_fetch_assoc($query);

              if ($row['role_id']==2) {
                $query=mysqli_query($connect,"UPDATE user SET role_id=1 , is_approved='Approved' ,is_active='Active' WHERE  user_id='$user_id'");
                header("location:view_all_users.php?message=This user is now Admin");

              }
             


          }
         



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update User's</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <style>
      .row{
        margin-left: 23%;
        margin-top: 15%;
        background-color: white;
        width: 450px;
        height: 500px;
        border-radius:10px;
             
      }
     
     </style> 
</head>
<body style="background-color:#717482">
<div class="container w-50" >
  <div class="row">
    <div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 col-sm-4 col-md-4" class="main">
  <h2 style="margin-bottom: 5%;margin-top: 2%;background-color: lightgray; width: 100%; height:10%;border-radius:10px;" align="center">Update User's
  </h2>
<?php
   if(isset($_REQUEST['update_user'])) {
              $user_id=$_REQUEST['update_user'];

             $select="SELECT * from user WHERE user_id=$user_id";
             $result=mysqli_query($connect,$select); 
             if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){ 
?>
                      
               
  <form action="#" method="POST">
    <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" class="form-control w-100" value="<?php echo $row['first_name']?>"   name="first_name" required>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control w-100"  value="<?php echo $row['last_name'];?>" name="last_name" required>
    </div>
     <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control w-100" value="<?php echo $row['email'];?>" name="email" required>
     </div>
     <div class="form-group">
     <label for="gender">Gender:</label>
        <input type="radio"  name="gender" value="Male" value="<?php echo $row['gender'];?>"> Male
        <input type="radio" name="gender"  value="Female" value="<?php echo $row['gender'];?>">Female
     </div>
     <div class="form-group mb-5">
        <label for="date of birth">Date of Birth:</label>
        <input type="date" class="form-control w-100" value="<?php  echo $row['date_of_birth']?>" name="date_of_birth" required>
     </div>
    <input type="submit" class="btn btn-primary w-100" name="update" value="Update" />
    <a href="view_all_users.php"><input type="button"  class="btn btn-danger w-100 " style="margin-top:2%;" name="update" value="Go Back" /></a>
    
      <?php  
            }
          }

       } 
      ?>
  </form>
</div>
</div>
</div>

</body>
</html>
