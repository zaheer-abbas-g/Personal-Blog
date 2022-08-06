<?php 
	
	include("connection/connection.php");
    include_once("sessionMentainance.php");
          if (isset($_GET['approve'])) {
           $user_id=$_GET['approve'];    
           $update="UPDATE user SET is_approved='Approved'  WHERE user_id=$user_id";
           $result=mysqli_query($connect,$update);  

           if ($result) {
                $message="account is Approved";
            }  
        }

        if (isset($_GET['active'])) {
            
            $user_id=$_GET['active'];
            
            $update="UPDATE user SET is_active='Active' WHERE user_id=$user_id";
            $result=mysqli_query($connect,$update);
            if ($result) {
                $message ="account is Active";
            }
        }
          if (isset($_GET['inactive'])) {
            
            $user_id=$_GET['inactive'];
            
            $update="UPDATE user SET is_active='InActive' WHERE user_id=$user_id";
            $result=mysqli_query($connect,$update);
            if ($result) {
                $message ="<p style='color:red'>account is InActive<p>";
            }
        }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>approve</title>
   
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
    .active{
        
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
            <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 2%;margin-bottom: 5%"> <h1>Approve User</h1>  </div>
          <h3 style="color:lightgreen;"> <?php echo isset($message)?($message):"" ?> </h3> 
            <table  border="1" class="" id="table_id" class="display">
            <thead>
                <tr  style="background-color:blue;color: white;" align="center">
                    <th scope="col">Profile</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col" style="width:12%">pproved</th>
                    <th scope="col" style="width:12%">Active</th>  
                    <th scope="col" style="width:12%">In Active</th>  
                </tr>
                
            </thead>
            <tbody>            

                <?php
                $select="SELECT * from user where role_id='2'";
                $result=mysqli_query($connect,$select);        

                   while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td> <img class="profile" src="<?php echo 'images/'.$row['user_image'];?>"></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['updated_at']; ?></td>
                                <td>
                                <a href="approve.php?approve=<?php echo $row['user_id'] ?>" style="text-decoration: none;">
                                <i class='fa fa-check' style='font-size:20px;color:green'>    
                                <span style="color:black"><?php echo $row['is_approved'];?></span>
                                </a></i>
                                </td>
                                <td> 
                                 <a href="approve.php?active=<?php echo $row['user_id']?>" style="text-decoration: none;">  
                                <div style="width: 33px; height: 33px; background-color: lightgreen;border-radius: 50%;">  
                                <span style="color:black;margin-left: 35px;font-size: 25px;"><?php echo $row['is_active'];?></span>
                                </div>
                                </a> 
                                </td>
                                 <td> 
                                 <a href="approve.php?inactive=<?php echo $row['user_id']?>" style="text-decoration: none;">  
                                <div  style="background-color: red;width: 33px; height: 33px; border-radius: 50%;">  
                                <span style="color:black;margin-left: 35px;font-size: 25px;"><?php echo $row['is_active'];?></span>
                                </div>
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
