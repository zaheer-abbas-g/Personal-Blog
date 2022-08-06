<?php 
	  			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Categories</title>

	     <!--  Add bootstrap css link  -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
         <!--  Add  fontawesome  link  -->
	
     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>
        <!--  Add  fontawesome  link  -->




<style type="text/css">
	label{
    color: black;
    font-weight: normal;
    float: left;
    margin-left: 60%;
	}

</style>



</head>
<body style="background-color:#717482">
<?php  require("navbar/nav.php");?>
 <?php include("sidebar/index.php"); ?>


<div class="container" style="margin-top: -2%;margin-bottom: 4%">
	<div class="row" style="margin-left: 15%"> 
		<div class="col-md-12 col-lg-12  col-sm-12 col-sm-4 col-md-4 col-xs-12">
	<center>
		<form method="POST" action="view_categories.php">
	<table class="table table-borderless mt-5">	
		<div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 10%;margin-top: -57%;">	<h1>Add Categories</h1> </div>

		<tr>
			<td><label>Title</label></td>
			<td> <input type="text" class="form-control w-75" name="title"></td>
		
		</tr>
		<tr>
		
			<td><label>Description</label></td>
			<td> <textarea cols="20" rows="4" class="form-control w-75" name="description" ></textarea></td>	
	
		</tr>	
		

		<tr>
			<td><label>Status</label></td>
			<td>
				<select name="status" class="form-select w-75" >
					<option>---Select---</option>
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
				</select>
			</td>		
		</tr>

		<tr>
			<td> </td>
		<td> <input type="submit"  name="add_button" value="Add" class="btn btn-info w-25 text-white" style="margin-left: 25%;"></td>
		</tr>

	</table>		
	</form>
</center>
</div>
</div>
</div>





<?php  require("headr/footer.php");?>
</body>
</html>

