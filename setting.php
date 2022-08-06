<?php 
	
	include("connection/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setting</title>
    !--  Add bootstrap css link  -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
         <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">

  <style>
  		label{
    color: black;
    font-weight: normal;
    float: left;
    margin-left: -40%;
	}
  </style>

</head>
<body style="background-color:#717482">
    
    <?php require_once("navbar/nav.php");
           include("sidebar/index.php");     
    ?>

    <div class="container" style="margin-bottom: 2%">
	<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-4 col-md-4 col-sm-4 col-lg-12">
    <center>
        
    <div style="width:80%;margin-top: -50%;margin-left: 20%">
        <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 2%;margin-bottom: 5%"> <h1>Blog Setting</h1> 
        </div>


     <table  id="table_id">
            <tbody>            
                <tr>
                  <td><label> Background Color</label></td>
                  <td> <input type="color" name="backgroundcolor"></td>
                </tr> 
                <tr>
                  <td><label> Font Color</label></td>
                  <td> <input type="color" name="fontcolor"></td>
                </tr> 
                <tr>
                  <td><label> Font Style</label></td>
                  <td> <input type="color" name="fontstyle"></td>
                </tr> 
                <tr>

                  <td colspan="2" align="center"> <br />
                  <input type="submit" name="colorbutton" class="btn btn-info w-75 text-white" value="Apply">
              		</td>
                </tr> 
            </tbody>
        </table>
    </div>
    </center>
    </div>
    </div>
    </div>




   

<?php include_once("headr/footer.php"); ?>
</body>
</html>