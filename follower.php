<?php 
  
  session_start();
  include("connection/connection.php");
  include_once("sessionMentainance.php");

    /*user follwer code*/

    if(isset($_GET['id'])){


    $status="Followed";

    
    $post_id=$_GET['id'];
    $user_id=isset($_SESSION['user']['user_id'])?$_SESSION['user']['user_id']:'';
    $q="INSERT INTO user_blog_following(follower_id)VALUES('$user_id')";
    $result1=mysqli_query($connect,$q);
        if ($result1) {
            header("location:index.php?msge=Followed");
        }
        else{
            echo "fail";
        }
        }

  
       
     



    /*Follower Status*/

    if(isset($_GET['follower_status'])) {
           $follower_id=$_GET['follower_status'];
                $query=mysqli_query($connect,"SELECT * FROM user_blog_following WHERE follow_id='$follower_id'");
                $result=mysqli_fetch_assoc($query);
                $result['status'];

                if($result['status']=='Followed'){
                $query=mysqli_query($connect,"UPDATE user_blog_following SET status='Unfollowed' WHERE follow_id='$follower_id'");    
                }
                else{
                $query=mysqli_query($connect,"UPDATE user_blog_following SET status='Followed' WHERE follow_id='$follower_id'");    
                }


            
        }



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Followers</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="bootstrap/js/jquery.js" ></script>
    
      <!--  Add bootstrap css link  -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>
         <!-- add fontawesome link -->
   <link rel="stylesheet" href="fontawesome/css/all.css">


</head>
<body style="background-color:#717482">
    
    <?php require_once("navbar/nav.php");?>
     <?php include("sidebar/index.php"); ?>

   <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-md-4 col-sm-4  col-lg-12 col-xs-4  ">
    <center>     
    <div style="width:96%;margin-top: -51%;margin-bottom: 33%;; margin-left: 14%;">
         <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 5%;  margin-bottom: 5%;">    <h1>View Followers</h1>
          </div>
            <table border="1" id="table_id" class="" class="display">
            <thead>
                <tr  style="background-color:blue;color: white;" align="center" >
                    <th scope="col">Follow ID</th>
                    <th scope="col">Follower ID</th>    
                    <th scope="col">Status</th>                     
                    <th scope="col">Created</th>           
                    <th scope="col">Updated</th>           
                </tr>
            </thead>
            <tbody>            
<?php
        $select="SELECT * from user_blog_following";
        $result=mysqli_query($connect,$select);        
                   while ($row = mysqli_fetch_assoc($result)) {?>
                            <tr border="1" align="center">
                                <td><?php echo $row['follow_id']; ?></td>
                                <td><?php echo $row['follower_id']; ?></td>
                                <td><a href="follower.php?follower_status=<?= $row['follow_id'];?>">
                                    <i class='fas fa-bell' style='font-size:20px;color:green'>
                                    <?php echo $row['status']; ?>
                                    </i>
                                    </a>
                                </td>  
                                <td><?php echo $row['created_at']; ?></td>   
                                <td><?php echo $row['updated_at']; ?></td>   
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