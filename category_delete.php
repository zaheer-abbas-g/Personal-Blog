<?php

        
    
                include("connection/connection.php");
                include_once("sessionMentainance.php");
                
                    if (isset($_REQUEST['delete'])) {
                        $id=$_REQUEST['delete'];
                        $query="DELETE FROM category where category_id=$id";
                        $result=mysqli_query($connect,$query);
                        header("location:view_categories.php");
                    }

?>                    