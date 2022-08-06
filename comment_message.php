<?php 

		session_start();
		include("connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Comment message</title>
	       <!--  Add bootstrap css link  -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<center style="margin-top:-5%;margin-bottom: 10%;">
		<form method="POST" action="#">

<?php 

		
	$post_id = $_GET['id']; 
	$query="SELECT is_comment_allowed FROM post
	WHERE post_id ='{$post_id}'";
	$result0=mysqli_query($connect,$query);
	$row0=mysqli_fetch_assoc($result0);
	
 if ($row0['is_comment_allowed']==0 && isset($_SESSION['user']['role_id'])==2) {?>
		<textarea cols="50" rows="10" name="comment" style="margin-top:15%;margin-bottom: 5%;margin-left: 1%;" disabled>
		    Comments are not allowed
		</textarea>
	<?php		
		}		


	else if (isset($_SESSION['user']['role_id'])==2) {?>
			<textarea cols="50" rows="10" name="comment" style="margin-top:15%;margin-bottom: 5%;margin-left: 1%;" >		
			</textarea>

<?php
	}
	else if (!isset($_SESSION['user']['role_id'])==2) {
			header("location:login.php?msgg=please login first");
	}
		
	?>	

			<br />
			<input type="submit" name="cbutton" value="Comment">
			<?php

	if (isset($_REQUEST['cbutton'])) {
    

    $post_id = $_GET['id']; 
    $user_id = isset($_SESSION['user']['user_id'])?$_SESSION['user']['user_id']:"";
    $fname = isset($_SESSION['user']['first_name'])?$_SESSION['user']['first_name']:"";
    $comment=$_REQUEST['comment'];
     date_default_timezone_set("Asia/Karachi");
    $created = date('Y-M-d H:i:s');

	 $query2="INSERT INTO user_post_comment(post_id,user_id,First_Name,created_at,comments)VALUES('$post_id','$user_id','$fname',NOW(),'$comment')";
      	$result2 = mysqli_query($connect,$query2) or die('q fail');

      	if($result2)
      	{
      		$message="Commented";
			echo "<br /><br /><br /><p style='color:success;'>".$message."</p>";
      	}
		}

 ?>
		</form>
	</center>
	<?php 
	   include("navbar/nav.php");
	   include("headr/footer.php");?>
</body>
</html>

