<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

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

   <div id="main-content">
        <div class="container" style="margin-top:5%">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">

                        <?php 

                   include_once("connection/connection.php"); 

                 $post_id = $_GET['id'];  

                

                       

                 $que="SELECT post.post_id,post.post_title,post.post_description,post.featured_image,post.author,category.category_title,user.first_name,post.category,post.created_at,post.updated_at

                 FROM post
                 LEFT JOIN category ON post.category = category.category_id
                 LEFT JOIN user ON  post.author = user.user_id WHERE post_id={$post_id}";

               $result=mysqli_query($connect,$que);
                if(mysqli_num_rows($result)>0) {    
                While($row=mysqli_fetch_assoc($result)){?>


                        <div class="post-content single-post">
                            <h3><?php echo $row['post_title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['category_id'];?>'><?php echo $row['category_title']; ?></a>
                                </span>
                                <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                 <a href='author.php?aid=<?php echo $row['author']; ?>'><?php echo $row['first_name']; ?></a>
                                </span>
                                <br/>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['created_at'] ?>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['updated_at'] ?>
                                </span>
                            </div>
                           <img src="<?php echo "upload_image/".$row['featured_image']?>" alt=""  style="width:100%" />
                            <p class="description">
                                  <?php echo $row['post_description'] ?>
                            </p>
                        </div>
                         <?php }}
                        
                        else{

                            echo "No record Found";
                        }      
                      ?>      
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>