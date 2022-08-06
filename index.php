<?php 

			include("connection/connection.php");
            

?>
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

</head>
<body>

	<?php include("navbar/nav.php");?>

   <div id="main-content">
        <div class="container" style="margin-top:5%;margin-bottom:5%">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">

                         <?php   if (isset($_GET['msge'])) {
                                    $msge=$_GET['msge'];
                        echo "<p style='color:green;font-weight:bold;margin-left:80%;'> $msge </p>";    
                                
                        } ?>

                        <?php 

                           $limit=3;
                   if (isset($_GET['page'])) {  
                      $page = $_GET['page'];
                   }
                   else{

                      $page = 1;
                   }

                   $offset = ($page-1) * $limit;

                   $que="SELECT *
                 FROM post
                 LEFT JOIN category ON post.category = category.category_id
                 LEFT JOIN user ON  post.author = user.user_id ORDER BY post.post_id
                 DESC LIMIT    $offset,$limit";

               $result=mysqli_query($connect,$que);
                if(mysqli_num_rows($result)>0) {    
                While($row=mysqli_fetch_assoc($result)){

             if ($row['post_status']=='Active') {
                    ?>    

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="<?php echo "upload_image/".$row['featured_image']?>" alt=""  style="width:100%" /></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['post_title']; ?></a></h3>
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
                                               <?php echo 'careated &nbsp;'.$row['created_at']; ?>
                                            </span>
                                             <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                               <?php echo 'updated &nbsp;'.$row['updated_at']; ?>
                                            </span>
                                        </div>
                                         <p class="description">
                                            <?php echo substr($row['post_description'], 0,130) ; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                         <a href="follower.php?id=<?php echo $row['post_id'];?>"> <i class='fas fa-bell' style='font-size:20px;color:saddlebrown;'></i>
                                        </a>
                                        <br/>
                                         <span>
                                               
 <a href="comment_message.php?id=<?php echo $row['post_id']; ?>">
  <i class='fas fa-comment' style='font-size:48px;color:saddlebrown;'></i>
 </a>   
  <a href="view_comments.php?id=<?php echo $row['post_id']; ?>">
  <i class='fas fa-eye' style='font-size:20px;color:saddlebrown'></i>
  </a>                                           </span> 

                          </div>
                        </div>
                    </div>
                </div>

                     <?php 
                        }  } }
                        else{

                            echo "No record Found";
                        }      
                      ?>       
                       
                    </div>


                 <!--    /*Show paginaton*/ -->

                    <?php 
                    $qu="SELECT * FROM post";
                      $result1=mysqli_query($connect,$qu) or ("Query failed");

                      if (mysqli_num_rows($result1)>0) {
                        
                        $total_records=mysqli_num_rows($result1);
                        $total_page=ceil($total_records/$limit);

                       echo  "<ul class='pagination admin-pagination'>";
                       if ($page >1) {
                         
                       echo "<Li style='font-size:30px;' ><a href='index.php?page=".($page-1)."'>Prev</a></li>";

                       }
                        for ($i=1; $i <=$total_page ; $i++) { 

                          if ($i == $page) {
                            $active = "active";
                          }
                          else{

                            $active = "";
                          }

                   echo   '<li style="font-size:30px;" class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                        }
                          if ($total_page >$page) {
                         
                       echo "<Li style='font-size:30px;' ><a href='index.php?page=".($page+1)."' >Next</a></li>";
                         
                       }
                      echo "</ul>";  
                      }

                      ?>


                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>


	<?php include("headr/footer.php")  ?>

</body>
</html>