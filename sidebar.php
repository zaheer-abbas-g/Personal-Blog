<?php session_start(); 
            
            include("connection/connection.php");
?>
<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
  
                      <?php
                 $que="SELECT *
                 FROM post
                 LEFT JOIN category ON post.category = category.category_id
                 ORDER BY post.post_id
                 DESC LIMIT 3";

               $result=mysqli_query($connect,$que);
                if(mysqli_num_rows($result)>0) {    
                While($row=mysqli_fetch_assoc($result)){

               
                 
                    ?>    

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="<?php echo "upload_image/".$row['featured_image']?>" alt=""  style="width:100%;height: 100px;" /></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['post_title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category_id'];?>'><?php echo $row['category_title']; ?></a>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                     <?php }}
                        
                        else{

                            echo "No record Found";
                        }      
                      ?>       
                       
      
    </div>
    <!-- /recent posts box -->
</div>
