<?php 
	
	
	  			
	include("connection/connection.php");
	include_once("sessionMentainance.php");
?>


	<?php  

							/* Update categories data*/

						if (isset($_REQUEST['Edit_button'])) {
								$id=$_REQUEST['edit'];
								extract($_REQUEST);
								date_default_timezone_set("Asia/Karachi");
                $updated = date('Y-m-d H:i:s');
						   	$query="UPDATE category SET category_title='$title',category_description='$description',category_status='$status',updated_at='$updated' WHERE category_id=$id";
								$result=mysqli_query($connect,$query);
								header("location:view_categories.php");

						}



							/*Category Status*/

						if (isset($_REQUEST['status'])) {
						$id=$_REQUEST['status'];
						
							$query1="SELECT * FROM category WHERE category_id='$id'";
							$result1=mysqli_query($connect,$query1);
							$row=mysqli_fetch_assoc($result1);

							if ($row['category_status']=='Active') {
							  	$result="UPDATE  category SET category_status='InActive' WHERE category_id='$id'";
									$query=mysqli_query($connect,$result);			
									 header("location:view_categories.php");
									}
							else{
									$query="UPDATE category SET category_status='Active' WHERE 
									category_id='$id'";
									$result=mysqli_query($connect,$query);
									header("location:view_categories.php");
							}
						
					}

		?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Categories Edit</title>

	     <!--  Add bootstrap css link  -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
  
     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>

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

		<?php 

				if (isset($_REQUEST['edit'])) {
						
					$category_id=$_REQUEST['edit'];
					$query1="SELECT * FROM category WHERE category_id='$category_id'; ";
			 		$result1=mysqli_query($connect,$query1);
					if (mysqli_num_rows($result1)>0) {
					$data=mysqli_fetch_assoc($result1);
					?>

		<form method="POST" action="#">
	<table class="table table-borderless mt-5">	
		<div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 10%;margin-top: -57%;">	<h1>Edit Categories</h1> </div>
		<tr>
			<td><label>Title</label></td>
			<td> <input type="text" class="form-control w-75" value="<?php 
					echo	$data['category_title']; ?>" name="title">
			</td>
		</tr>
		<tr>
			<td><label>Description</label></td>
			<td> <textarea cols="20" rows="4" class="form-control w-75"  name="description" ><?php echo	$data['category_description']; ?></textarea>
			</td>	
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
		<td> <input type="submit"  name="Edit_button" value="Edit" class="btn btn-info w-25 text-white" style="margin-left: 25%;"></td>
		</tr>
	</table>		
	</form>
	<?php

			}
						
					}

	?>
</center>
</div>
</div>
</div>
<?php  require("headr/footer.php");?>
</body>
</html>


