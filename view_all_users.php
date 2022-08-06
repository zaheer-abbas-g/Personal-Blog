<?php 
	include("connection/connection.php");
    include_once("sessionMentainance.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View User</title>

     <!-- Add bootstrap link -->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
      <!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="bootstrap/js/jquery.js" ></script>
   <!-- add fontawesome link -->
<link rel="stylesheet" href="fontawesome/css/all.css">
     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">


  <style>
    .profile{

            width: 50px;
            height: 50px;
            border-radius: 50%;
    }
  </style>  

</head>
<body style="background-color:#717482"> 
    <?php require_once("navbar/nav.php");?>
     <?php include("sidebar/index.php"); ?>
<div class="container" style="margin-bottom:2%;">
<div class="row">
<div class="col-sm-12 col-md-12 col-xs-4 col-md-4 col-sm-4 col-lg-12">
<center>    
    <div style="width:97%;margin-top: -48%;margin-bottom: 5%;margin-left: 14%"> 
        <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 2%;margin-bottom: 5%"> <h1>View  All User's</h1>
        </div>
          <h3 style="color:lightgreen;"> <?php echo isset($_REQUEST['message'])?($_REQUEST['message']):"" ?> </h3> 
            <table  border="1" class="" id="table_id" class="display">
            <thead>
                <tr  style="background-color:blue;color: white;" align="center">
                    <th scope="col">Profile</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Active</th>  
                    <th scope="col">Update</th>  
                    <th scope="col">Role ID</th>  
                    </tr>
            </thead>
            <tbody>            
                <?php
        $select="SELECT * from user WHERE role_id='2'";
        $result=mysqli_query($connect,$select);        

                   while ($row = mysqli_fetch_assoc($result)) {?>
                <tr align="center">
                    <td><img class="profile" src="<?php echo 'images/'.$row['user_image'];?>"></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['date_of_birth'];?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['updated_at']; ?></td>
                    <td><?php echo $row['is_approved'];?></td>
                    <td><?php echo $row['is_active'];?></td>
                    <td><a href="update_user.php?update_user=<?php echo $row['user_id'];?>">
                        <i class='far fa-edit' style='font-size:30px;color:gray'>
                        </i></a>
                    </td>
                     <td><a href="update_user.php?role_id=<?php echo $row['user_id'];?>">
                        <i class='fas fa-lock-open' style='font-size:20px;color:gray'>
                        <?php echo $row['role_id'] ?>
                        </i>
                        </a>
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

<?php include_once("headr/footer.php"); ?>
</body>
</html>


