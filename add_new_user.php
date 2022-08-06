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
 
   <!-- add fontawesome link -->
   <link rel="stylesheet" href="fontawesome/css/all.css">

     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>

     <title>Add New User</title>
</head>
<style>
   label{
    color: black;
    font-weight: normal;
    float: left;
    margin-left: 10%;
  }
  .row{

  }
</style>
<body style="background-color:#717482">
<?php include("navbar/nav.php")?>
<?php include("sidebar/index.php");?>  


  
                      <?php
                          if (isset($_REQUEST['add_new_user'])) {   
                              $first_name=$_REQUEST['first_name'];  
                              $last_name=$_REQUEST['lastname']; 
                              $email=$_REQUEST['email'];  
                              $password=$_REQUEST['password'];  
                              $gender=isset($_REQUEST['gender'])?$_REQUEST['gender']:"";  
                              $address=$_REQUEST['address'];
                              $date_of_birth=$_REQUEST['date_of_birth'];
                              $image = $_FILES['image']['name'];
                              $image_size = $_FILES['image']['size'];
                              $image_tmp_name = $_FILES['image']['tmp_name'];
                              $image_folder = 'upload_image/'.$image;
          
                              $select = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
                               if(mysqli_num_rows($select)>0){
                                 //header('location:add_new_user.php?message=user already exist'); 
                                  $message=" user already exist ";
                               }
                            elseif($image_size>  1048576){
                                // header("location:add_new_user.php?message=image size is too large!");
                                  $message="image size is too large!";
                                }
                              
                              else{
                              move_uploaded_file($image_tmp_name, $image_folder);
                                //  header("location:login.php?msg=You are Succefully Registered"); 
                                  $msg="user Succefully Registered";
                                  
                              $query="INSERT INTO user(first_name,last_name,email,password,gender,date_of_birth,user_image,address)VALUES('$first_name','$last_name','$email','$password','$gender','$date_of_birth','$image','$address')";    
                              $result=mysqli_query($connect,$query);
                        }
                          }

                      ?> 

<div class="container mb-5" style="margin-top:-42%;margin-left: 20%;" >
  <h3 style="color:white;" align="center"> ADD  USER</h3>
  <hr style="width:130px; height:4px;color:white;margin-left: 45%;" class="mb-3" >
  <p style="color:red;font-size: 20px;font-weight: bold;margin-left: 25%;">
  <?php echo isset($message)?($message):""; ?> 
</p>
 <p style="color:green;font-size: 20px;font-weight: bold;margin-left: 25%;">
  <?php echo isset($msg)?($msg):""; ?> 
</p>
<div class="row" style="margin-bottom:5%;" >  
<center>
<div class="col-lg-6 col-xs-4 col-md-12 col-sm-4 p-3 shadow-lg p-3"  style="border: 1px solid gray ;border-radius: 10px;background-color: white;">
<form method="POST" action="#" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
 <table class="table table-borderless"> 
  <tbody>
    <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">First name:</label></td>
        <td>  <input type="text" class="form-control" name="first_name" id="firstname" placeholder="Enter First Name" required></td>
      </div>
    </tr>
     <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Last Name:</label></td>
        <td>  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" required></td>
      </div>
    </tr>
     <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Email:</label></td>
        <td> <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"></td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Password:</label></td>
        <td>  <input type="password" class="form-control" name="password" id="password" ></td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Gender:</label></td>
        <td>  <input type="radio"  name="gender" id="male" value="Male">Male &nbsp;<input type="radio"  name="gender" id="male" value="Female">Female</td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Date Of Birth:</label></td>
        <td> <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" ></td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Upload image:</label></td>
        <td>  <input type="file"  name="image" id="image" ></td>
      </div>
    </tr>
     <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Address:</label></td>
        <td>  <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" ></td>
      </div>
    </tr>
  <tr>
    <td> </td>
  <td>
     <div class="col-md-12" align="center">
         <input type="submit" name="add_new_user" id="button" class="btn btn-info w-100 text-white" value="Add">
     </div>
  </td>
  </tr>

  </tbody>
</table>
</form>
</div>
</center>
</div>
</div>

   
<?php include("headr/footer.php"); ?>
</body>
</html>


