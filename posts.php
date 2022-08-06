<?php 
       require_once("connection/connection.php");  
       include_once("sessionMentainance.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>
    
        <!-- Add bootstrap link -->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
      <!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
      
         <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>
    

</head>
<style>
    .container{
        padding : 100px
    }
    .require {
    color: #666;
    }
label  {
    color: black;
    font-weight: normal;
    float: left;
    }

 input{

    margin-left: 67px;
 }   


</style>
<body style="background-color:#717482">

<?php require_once("navbar/nav.php") ?>
<?php include("sidebar/index.php"); ?>

<div class="container" style="margin-top: -5%;margin-bottom: -2%">
	<div class="row" style="margin-left: 15%;">
      <center>  
    	<div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 10%;margin-top: -72%;margin-bottom: -1%">	<h1>Create post</h1> </div>

        
	    <div class="col-md-8 col-md-offset-2 mt-5">
    		<form action="view_post.php" method="POST" enctype="multipart/form-data">
    		  
                <div  class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group">
    		        <label for="title" >Title</label>
    		        <input type="text" class="form-control w-75" name="title"  required style="margin-left: 16%" />
    		    </div>
    		    <br />
    		    <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group">
    		        <label for="description">Summary</label>
    		        <textarea rows="3" class="form-control w-75" name="summary" style="margin-left: 16%"></textarea required>
    		    </div>
                 <br />
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group" style="margin-left: -2%">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control w-75" name="description"style="margin-left: 18%" ></textarea required>
                </div>
                <br />
                 <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group" style="margin-left: -2%">
                    <label for="description">Featured Image</label>
                    <input type="file" name="featured_image" style="margin-left: -35%" required>
                </div>    
                <br />
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" >
                <label>Status</label>
                <select name="post_status" class="form-select w-75" style="margin-left: 17%">
                    <option>---Select---</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                </div>
                 <br /> 
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" >
                <label>Category</label>
                <select name="category" class="form-select w-75" style="margin-left: 17%">
                    <option >---Select Category---</option>

                     <?php 
                
                $select ="SELECT  * FROM category";
                $result3 = mysqli_query($connect,$select);
                if (mysqli_num_rows($result3)>0) {
                    while($row = mysqli_fetch_assoc($result3)){
           echo "<option value='{$row['category_id']}'>{$row['category_title']}
                      </option>";
                  }
                }

    
                  ?>

              
                </select>
                </div> 		    
    		       <br />
                 <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12">
                <label>Comment Allowed</label>
                <input type="radio" name="comment" value="1" style="margin-left: -35%" required>Yes
                <input type="radio" name="comment" value="0" style="margin-left: -35%" required>No
                    
                    
                </select>
                </div>          
                <br />
    		    <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group">
    		       <td> <input type="submit"  name="post_button" value="Post" class="btn btn-info w-25 text-white" style="margin-left: 25%;"></td>
    		    </div>
    		    
    		</form>
		</div>
		</center>
	</div>
</div>
       

<?php include("headr/footer.php")?>
</body>
</html>