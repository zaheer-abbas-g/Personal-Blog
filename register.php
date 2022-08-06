<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
   
      <!--  Add bootstrap css link  -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <!--  Add bootstrap JavaScript link  -->
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--  Add  fontawesome  link  -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  

<style>

      label{
        margin-top: 5%;
        font-size: 15px;
        font-family: sans-serif;
      } 


      input[type="submit"]{
        font-size: 20px;
        font-family: sans-serif;
        width: 100px;
        height: 38px;
        background-color:lightgreen;
        border-radius: 5px;
        margin-left: 90px;
      } 

        span{
            color: red;
          }

        .inputtext{

            margin-top: 40%;

        }

 </style> 
    

</head>
<body style="background-color:#717482">
<?php require_once("navbar/nav.php") ?>
            <!-- Registration Form -->
<div class="container mb-5" style="margin-top:5%;" >
  <h3 style="color:white;">REGISTER HERE</h3>
<p style="color:red;font-size: 20px;font-weight: bold;">


  <?php echo isset($_REQUEST['message'])?$_REQUEST['message']:"" ?> 
</p>
  



  <hr style="width:190px; height:4px;color:white;" class="mb-3">
  <tr>
          </tr>
          <?php
          if(isset($_REQUEST['error_messages'])){
            ?>
            <tr>
              <td colspan="3" >
                <ul>
                  <p style="color:red"><?php echo $_REQUEST['error_messages']?></p>
                </ul>
              </td>
            </tr>
            <?php
          }
          ?>
          <tr>

<div class="row" >  
<div class="col-lg-6 col-xs-12 col-md-4 col-sm-12 p-3 shadow-lg p-3"  style="border: 1px solid gray ;border-radius: 10px;background-color: white">
<form method="POST" action="register_process.php" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
 <table class="table table-borderless"> 
  <tbody>
    <tr>
  <div class="col-md-4" >
        <td><label  class="form-label">First name:</label></td> 
    <td> 
    <input type="text" class="form-control w-75" name="first_name" id="firstname" placeholder="Enter First Name " aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
            Please Enter First Name
      </div>
    </td>
   </div>

    </tr>
     <tr>
      <div class="col-md-4" >
       <td> <label  class="form-label ">Last Name:</label></td>
        <td >  <input type="text" class="form-control  w-75" name="lastname" id="lastname" placeholder="Enter Last Name" style="margin-top: 1%" required>
          <div class="invalid-feedback">
              Please Enter Last Name 
           </div>
        </td>
      </div>
    </tr>
     <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Email:</label></td>
        <td> <input type="email" class="form-control w-75" name="email" id="email" placeholder="name@example.com" required>
          <div class="invalid-feedback">
            Please Enter Email Address
          </div> 
        </td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Password:</label></td>
        <td>  <input type="password" class="form-control w-75" name="password" id="password" required>
            <div class="invalid-feedback">
              Please Enter valid Password
            </div>
        </td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Gender:</label></td>
        <td>  <input type="radio"  name="gender" id="male" value="Male">Male &nbsp;<input type="radio"  name="gender" id="male" value="Female" required>Female
            <div class="invalid-feedback">
              Please Enter Gender
            </div> 
        </td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Date Of Birth:</label></td>
        <td> <input type="date" class="form-control w-75" name="date_of_birth" id="date_of_birth" required>
          <div class="invalid-feedback">
            Please Enter Date Of Birth
           </div> 
        </td>
      </div>
    </tr>
      <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Upload image:</label></td>
        <td>  <input type="file"  name="image" class="form-control w-75" id="image" required>
              <div class="invalid-feedback">
                Please Select File
              </div>  
        </td>
      </div>
    </tr>
     <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Address:</label></td>
        <td>  <input type="text" class="form-control w-75" name="address" id="address" placeholder="Enter address" required>
          <div class="invalid-feedback">
            Please Enter Your Address
          </div>
        </td>
      </div>
    </tr>

  <tr>
    <td> </td>
      <td>
     <div class="col-md-12">
         <input type="submit" name="submit_register" id="button" value="Register">
        </div>
      </td>
  </tr>

  </tbody>
</table>
</form>
    </div>
     
      <!-- Form Image -->
    <div class="col-lg-4" >
        <img src="images/registration.webp" width="600" height="610" class="shadow-lg" style="border: 1px solid gray ;border-radius: 10px;" >
    </div>
    <div class="col-lg-2"></div>

  </div>
</div>



    <script type="text/javascript">
      

(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()


    </script>



<?php include("headr/footer.php") ?>

</body>
</html>