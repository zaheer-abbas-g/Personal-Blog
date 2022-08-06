<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>

      label{

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
        margin-left: 10px;
      } 

 </style> 

</head>
<body style="background-color:#717482">

<?php require_once("navbar/nav.php") ?>

<div class="container mb-5" style="margin-top:10%">
  <h3 style="color:white;">LOGIN HERE</h3>
  <p style="color:lightgreen;font-size: 20px;font-weight: bold;">
  <?php echo isset($_REQUEST['msg'])?$_REQUEST['msg']:""?> 
  <?php echo isset($_REQUEST['msgg'])?$_REQUEST['msgg']:""?> 
</p>

  <p style="color:red;font-size: 20px;font-weight: bold;">
  <?php echo isset($_REQUEST['message'])?$_REQUEST['message']:""?> 
</p>

   
  <hr style="width:150px; height:4px;color:white;" class="mb-3">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-4 col-xs-12 col-md-4 col-sm-12 p-3 shadow-lg" style="border: 1px solid gray ;border-radius: 10px;background-color: white " >
  <form method="POST" action="login_process.php"  class="row g-3 needs-validation" novalidate>
  <table class="table table-borderless"> 
  <tbody>
    <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Email:</label></td>
        <td>  <input type="email" class="form-control" name="email" id="email" placeholder="name@gmail.com" required>
          <div class="invalid-feedback">
              Please Enter Email Address
          </div>
        </td>
      </div>
    </tr>
     <tr>
      <div class="col-md-4">
        <td>  <label  class="form-label">Password:</label></td>
        <td>  <input type="password" class="form-control" name="password" id="password" required>
            <div class="invalid-feedback">
                Please Enter Password
            </div>  
        </td>
      </div>
    </tr>
     <tr>
      <td> </td>
      <div class="col-md-4">
        <td> 
             <div class="form-check">
             <input type="checkbox" class="form-check-input" id="dropdownCheck" name="remember_me">
             <label class="form-check-label" for="dropdownCheck">
                     Remember me </label> <br /> 
                   <a href="register.php" style="text-decoration: none;">Create an account?</a> &nbsp;&nbsp;
                   <a href="forget.php"  style="text-decoration: none;">Forgot password?</a>
             </div>
        </td>
      </div>
    </tr> 
 
      <tr>   
        <td colspan="2" align="center">
        <input type="submit" name="submit_login"  id="button" value="Login"/>
         </td>
      </tr>
  </table>  
  </form>
</div>

<div class="col-lg-4">
      <img src="images/login_image0.jpg" width="500" height="500" class="shadow-lg" style="border: 1px solid gray;border-radius: 10px;" >
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



<?php require_once("headr/footer.php")?>


</body>
</html>