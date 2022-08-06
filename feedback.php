<?php 
  
  include("connection/connection.php");
  include_once("sessionMentainance.php");
  
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comments</title>

         <!-- Add bootstrap link -->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
      
      <!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="bootstrap/js/jquery.js" ></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


         <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>
        <!--  Add  fontawesome  link  -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body style="background-color:#717482">
    
    <?php require_once("navbar/nav.php");?>
         <?php include("sidebar/index.php"); ?>
    

   
   <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-md-4 col-sm-4  col-lg-12 col-xs-4  ">
    <center>
        
    <div style="width:96%;margin-top: -51%;margin-bottom: 33%;; margin-left: 14%;">
            
          <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 2%; margin-bottom: 5%;">    <h1>View Feedback</h1>
          </div>
            <table id="table_id" class=" " class="display">
            <thead>
                <tr  style="background-color:blue;color: white;" align="center">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>           
                    <th scope="col">Feedback</th>           
                    <th scope="col">created</th>           
                    <th scope="col">updated</th>           
                </tr>
            </thead>
            <tbody>            

                <?php

        $select="SELECT user_name,user_id,user_email,feedback,created_at,updated_at from user_feedback";
        $result=mysqli_query($connect,$select);        

                   while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr align="center">
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['feedback']; ?></td>
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