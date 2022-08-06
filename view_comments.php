<?php 

 session_start(); 
include("connection/connection.php");

  if ($_SESSION['user']['role_id']!=2) {
      header("location:login.php?msgg=please login first");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>


    <!-- add Datatable link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- add jquery link -->
    <script type="text/javascript" src="bootstrap/js/jquery.js" ></script>
      

       <!--  Add bootstrap css link  -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 
      <!-- add fontawesome link -->
  <link rel="stylesheet" href="fontawesome/css/all.css">


                  <!-- custom css -->
  <link rel="stylesheet" href="css/style1.css">

    <style>
    </style>
</head>
<body>

    <?php include("navbar/nav.php");?>

   

<?php 
  
  

        /*Comment Status*/    

        if (isset($_GET['comment_status'])){
            $comment_id=$_GET['comment_status'];
           $query=mysqli_query($connect,"SELECT * FROM user_post_comment WHERE post_comment_id='$comment_id'");
            $data=mysqli_fetch_assoc($query);
           echo $data['is_active'];
           if($data['is_active']=='Active'){
            $query=mysqli_query($connect,"UPDATE user_post_comment SET is_active='InActive' WHERE post_comment_id='$comment_id'");

           }
           else{
            $query=mysqli_query($connect,"UPDATE user_post_comment SET is_active='Active' WHERE post_comment_id='$comment_id'");

           }

   


            }




?>

 <div class="container" style="margin-top:6%;margin-bottom:12%;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-md-4 col-sm-4  col-lg-12 col-xs-4  ">
    <center>   
            <table border="1" id="table_id" class="" class="display" width="100%">
            <thead>
                <tr style="background-color:blue;color: white;" align="center">
                    <th scope="col">Post Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Created</th>           
                    <th scope="col">Is_Active</th>                     
                    <th scope="col">Comments</th>                     
                </tr>
            </thead>
            <tbody>            

                <?php

        $select="SELECT * from user_post_comment ORDER By comments ASC";
        $result=mysqli_query($connect,$select);        

                   while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                           <tr border="1" align="center">
                                <td><?php echo $row['post_id']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['First_Name']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>   
                                <td><a href="comments.php?comment_status=<?php echo $row['post_comment_id'] ?>">
                                    <i class='fas fa-lock-open' style="font-size:20px;color:green">
                                    <?php echo $row['is_active']; ?> 
                                    </i>
                                    </a>
                                </td>
                                <td><?php echo $row['comments']; ?></td>   
                                                                    
                                
                            </tr>
                        <?php
                    } 
                ?>
                
            </tbody>
        </table>
   
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



                        
    <?php include("headr/footer.php")  ?>

</body>
</html>