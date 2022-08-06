<?php 
	
         
	   
         include("connection/connection.php");
        include_once("sessionMentainance.php");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Categories</title>

         <!-- Add bootstrap link -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <!-- add Datatable link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- add jquery link -->
    <script type="text/javascript" src="bootstrap/js/jquery.js" ></script>
      <!-- add fontawesome link -->
    <link rel="stylesheet" href="fontawesome/css/all.css">

     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>


</head>
<body style="background-color:#717482">
    
    <?php require_once("navbar/nav.php");?>
    <?php include("sidebar/index.php"); ?>

<div class="container" style="margin-bottom: 2%;">
<div class="row" style="margin-left: 15%">
    <div class="col-sm-12 col-md-12 col-xs-4 col-md-4 col-sm-4 col-lg-12">
     
    <center>
        
    <div style="width:114%;margin-top:-60%;margin-left: -2%">
        
        <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 2%;margin-bottom: 5%"> <h1>View Categories</h1> </div>


            <table border="1" class="" id="table_id" class="display" >
                        <thead>
                            <tr class="text-white" style="background-color:blue" align="center">
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
              <tbody>            

                    <?php

                        /* Insert Data */
                    if(isset($_REQUEST['add_button'])){
                    extract($_REQUEST);
                    $query="INSERT INTO category(category_title,category_description,category_status)VALUES('$title','$description','$status')";
                    $result=mysqli_query($connect,$query);
                    }



                        /*Fetch data*/
                    $select="SELECT * FROM category";
                    $result=mysqli_query($connect,$select);        
                   while ($row = mysqli_fetch_assoc($result)) {
                    ?>
        <tr> 
                            <td><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['category_title']; ?></td>
                            <td><?php echo $row['category_description']; ?></td>
                            <td style="width:10%;">
                            <a href="category_edit.php?status=<?php echo $row['category_id']?>">
                            <i class='fas fa-lock-open' style="font-size:20px;color:green">
                                <?php echo $row['category_status'];?>
                            </i>
                            </a>  
                            </td>
                            <td><?php echo $row['created_at']?></td>
                            <td><?php echo $row['updated_at']?></td>
                <td align="center">
                    <a href="category_edit.php?edit=<?php echo $row['category_id'];?>">
                    <i class="fa fa-edit" style="font-size:25px;color:blue"></i>     
                    </a> 
                </td>
                <td align="center">
                     <a href="category_delete.php?delete=<?php echo $row['category_id'];?>">   
                    <i class="fa fa-trash" style="font-size:25px;color:red"></i>  </a>      
                </td>
        </tr>
                        <?php
                    } 
                ?>
                
            </tbody>
        </table>
    </div>
    </center>
</div>
</div>
</div>

    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js" ></script>
    
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
    <?php require_once("headr/footer.php"); ?>
</body>
</html>



