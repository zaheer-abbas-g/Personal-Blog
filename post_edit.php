        <?php

     
        include_once("connection/connection.php");
        include_once("sessionMentainance.php");
        
           /* Update Data */ 
        if (isset($_REQUEST['edit_button'])){            
             $id=$_GET['edit'];
             extract($_REQUEST); 
           
             date_default_timezone_set("Asia/Karachi");
             $updated = date('Y-m-d H:i:s');

              $featured_image=$_FILES['featured_image']['name'];
              $image_tmp=$_FILES['featured_image']['tmp_name'];
              $image_upload='upload_image/'.$featured_image;

             $query="UPDATE post SET post_title='$title',post_summary='$summary'
             ,post_description='$description',featured_image='$featured_image'
             ,post_status='$post_status',is_comment_allowed='$comment',updated_at='$updated' WHERE post_id=$id";
          
            $result=mysqli_query($connect,$query);
               move_uploaded_file($image_tmp, $image_upload);                
               header("location:view_post.php");    
             }



          /* Active  or InActive Post */ 

          if (isset($_REQUEST['status'])) {
                $post_id=$_REQUEST['status'];
                $select="SELECT * FROM post WHERE post_id='$post_id'";
                $result=mysqli_query($connect,$select);
                $row=mysqli_fetch_assoc($result);


                if ($row['post_status']=='Active') {      
                $select="UPDATE  post SET post_status='InActive' WHERE post_id='$post_id'";
                $result=mysqli_query($connect,$select);
                       header("location:view_post.php");  
                }
                else{
                $select="UPDATE  post SET post_status='Active' WHERE post_id='$post_id'";
                $result=mysqli_query($connect,$select);
                      header("location:view_post.php");  
                    }



                }


                /* is_Comment Allowed */

               if (isset($_REQUEST['comment'])) {
               $post_id=$_REQUEST['comment']; 
               $query= "SELECT * FROM post WHERE post_id='$post_id'";     
           
               $result=mysqli_query($connect,$query);
               $data=mysqli_fetch_assoc($result);
               echo $data['is_comment_allowed'];

               if ($data['is_comment_allowed']==1) {
               $query="UPDATE post SET is_comment_allowed='0' WHERE post_id='$post_id'"; 
               $resul=mysqli_query($connect,$query);
                   header("location:view_post.php");
                 }  
                  else{
               $query="UPDATE post SET is_comment_allowed='1' WHERE post_id='$post_id'"; 
               $resul=mysqli_query($connect,$query);
                   header("location:view_post.php");
                  } 
                }
               
            

      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    
         <!--  Add bootstrap css link  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- js link -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
 
  
     <!--  Add sidebar css link  -->
  <link rel="stylesheet" type="text/css" href="sidebar/sidebars.css">
        <!--  Add js JavaScript link  -->
  <script type="text/javascript" src="sidebar/sidebars.js"></script>

</head>
<style>
    .container{
        padding : 100px
    }
    .require {
    color: #666;
    }
label  {
    color: black;
    font-weight: normal;
    float: left;
    }

 input{

    margin-left: 67px;
 }   


</style>
<body style="background-color:#717482">

<?php require_once("navbar/nav.php") ?>
  <?php include("sidebar/index.php"); ?>

<div class="container" style="margin-top: 1%;margin-bottom: -12%">
    <div class="row" style="margin-left: 15%;">
      <center>  
        <div class="col-sm-12 text-black" style="background-color: lightgray;border-radius: 10px;width: 50%;margin-left: 10%;margin-top: -84%;margin-bottom: -1%">  <h1>Edit post</h1> </div>

        <div class="col-md-8 col-md-offset-2 mt-5">
                <?php 

                    if (isset($_REQUEST['edit'])) {
                        $post_id=$_REQUEST['edit'];
                        $query="SELECT * from post WHERE post_id='$post_id'";
                       $result=mysqli_query($connect,$query);
                        if (mysqli_num_rows($result)>0) {
                            $row=mysqli_fetch_assoc($result);
                            ?>

            <form action="#" method="POST" enctype="multipart/form-data">
              
                <div  class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group">
                    <label for="title" >Title</label>
                    <input type="text" class="form-control w-75" name="title"
                     value="<?php echo $row['post_title']; ?>" style="margin-left: 16%" />
                </div>
                <br />
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group">
                    <label for="description">Summary</label>
                    <textarea rows="3" class="form-control w-75" name="summary"
                      style="margin-left: 16%"> <?php echo  $row['post_summary'];?> </textarea>
                </div>
                 <br />
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group" style="margin-left: -2%">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control w-75" name="description"style="margin-left: 18%">
                     <?php echo $row['post_description'];?>   
                    </textarea >
                </div>
                <br />
                 <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group" style="margin-left: -2%">
                    <label for="description">Featured Image</label>
                    <input type="file" name="featured_image"  style="margin-left: -35%" >
                </div>    
                <br />
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" >
                <label>Status</label>
                <select name="post_status" class="form-select w-75" style="margin-left: 17%" >
                    <option>---Select---</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                </div>          
                   <br />
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" >
                <label>Category</label>
                <select name="category" class="form-select w-75" style="margin-left: 17%">
                    <option >---Select Category---</option>

                     <?php 
                
                $select ="SELECT  * FROM category";
                $result3 = mysqli_query($connect,$select);
                if (mysqli_num_rows($result3)>0) {
                    while($row = mysqli_fetch_assoc($result3)){
           echo "<option value='{$row['category_id']}'>{$row['category_title']}
                      </option>";
                  }
                }
                  ?>
                </select>
                </div>         

                 <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12">
                <label>Comment Allowed</label>
                <input type="radio" name="comment" value="1" style="margin-left: -35%" required>Yes
                <input type="radio" name="comment" value="0" style="margin-left: -35%" required>No
                    
                </div>          
                <br />
                <div class="col-md-12 col-lg-12  col-sm-12 col-xs-12" class="form-group">
                   <td> <input type="submit"  name="edit_button" value="Edit" class="btn btn-info w-25 text-white" style="margin-left: 25%;"></td>
                </div>
                
            </form>

            <?php 


                        }
                    }

                ?>
        </div>
        </center>
    </div>
</div>
       


<?php include("headr/footer.php")?>
</body>
</html>


