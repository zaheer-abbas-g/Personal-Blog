<?php 
	
	include("connection/connection.php");
    include_once("sessionMentainance.php");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Post</title>


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
    
    <?php 
    require_once("navbar/nav.php");
    include("sidebar/index.php"); 
    ?>


        <?php 

                /*Insert data into databse*/

            if (isset($_REQUEST['post_button'])) {
                extract($_REQUEST);
                extract($_FILES);
        echo        $author = $_SESSION['admin']['user_id'];   


                $featured_image=$_FILES['featured_image']['name'];
                $image_tmp=$_FILES['featured_image']['tmp_name'];
                $image_upload='upload_image/'.$featured_image;

             $query="INSERT INTO post (category,post_title,post_summary, post_description,featured_image,post_status,is_comment_allowed,author)VALUES('$category','$title','$summary','$description','$featured_image','$post_status','$comment','$author')"; 
             $result=mysqli_query($connect,$query);
             if ($result) {
                    move_uploaded_file($image_tmp, $image_upload);
             }

            }
         ?>

<div class="container" style="margin-top:1%;">
<div class="row" style="margin-left: 13%;margin-bottom: 3%">
    <div class="col-sm-12 col-md-12 col-xs-4 col-md-4 col-sm-4 col-lg-12">
    <center>  
    <div style="width:112%;margin-top:-62%;margin-bottom: 3%;">
        
        <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 2%;margin-bottom: 2%"> <h1>View Post</h1> </div>

            <table border="1" class="" id="table_id" class="display" >
            <thead>
                <tr  style="background-color:blue;color: white;" align="center">
                    <th scope="col">SNo#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Comment Allowed</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>            

                <?php

        $select="SELECT * FROM post";
        
                /* $select="SELECT post.post_id,post.post_title,post.post_description,post.featured_image,post.author,category.category_title,user.first_name,post.category,post.created_at,post.updated_at

                 FROM post
                 LEFT JOIN category ON post.category = category.category_id
                 LEFT JOIN user ON  post.author = user.user_id WHERE post_id={$post_id}";
*/

        $result=mysqli_query($connect,$select);        

                        $i=1;
                   while ($row = mysqli_fetch_assoc($result)) {
                      
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['post_title']; ?></td>
                        <td><?php echo $row['post_summary']; ?></td>
                        <td><?php echo $row['post_description']; ?></td>
                        <td><img src="<?php echo 'images/'.$row['featured_image'];?>" width="100px"></td>
                        <td style="width:10%">
                            <a href="post_edit.php?status=<?php echo $row['post_id']?>">
                            <i class='fas fa-lock-open' style="font-size:20px;color:green">
                                <?php echo $row['post_status'];?>
                            </i>
                            </a>     
                        </td>
                        <td align="center">
                            <a href="post_edit.php?comment=<?php echo $row['post_id']?>">
                            <i class='fa fa-ban' style="font-size:20px;color:green">
                                <?php 

                                if($row['is_comment_allowed']==1){
                                    echo "Yes";
                
                                }
                                else{
                                    echo "No";
                                }
                                
                                ?>
                            </i>
                            </a>     
                        </td>
                        <td><?php echo $row['created_at'];?></td>
                        <td><?php echo $row['updated_at'];?></td>
                        <td align="center">
                        <a href="post_edit.php?edit=<?php echo $row['post_id'];?>">
                            <i class="fa fa-edit" style="font-size:25px;color:blue"></i>      
                        </a>
                        </td>
                        <td align="center">
                        <a href="post_delete.php?delete=<?php echo $row['post_id'];?>">   
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

    <?php include("headr/footer.php");?>
</body>
</html>



