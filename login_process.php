<?php 

				session_start();
				include_once("connection/connection.php");

				if (isset($_REQUEST['submit_login'])) {
					
		           extract($_REQUEST);

	
					$query="SELECT * FROM user WHERE email='$email' and password='$password'";
					$result=mysqli_query($connect,$query);
					
		if($result->num_rows > 0)
		{

			$row = mysqli_fetch_assoc($result);
			// $_SESSION['user']= $row['user_id'];
			// $_SESSION['usr']= $row['role_id'];

			if($row['role_id'] ==1 &&  $row['is_approved']=='Approved' && $row['is_active']=='Active'){
				$_SESSION['admin']=$row;
				header("location:home.php");
			}
			else if($row['role_id'] ==2 && $row['is_active']=='Active' && $row['is_approved']=='Approved'){
				$_SESSION['user']=$row;
				header("location:index.php");
			}
			else if($row['role_id']==2 && $row['is_approved']=='Pending'){
				header('location:login.php?message= <h3 style="color:lightgreen">Account is in Pending please wait for Approve...!</h3>');
		    }
		    else if($row['role_id']==2 && $row['is_approved']=='Rejected'){
		    	header("location:login.php?message=your account is Rejected");

		    }
			else if ($row['role_id']==2 &&  $row['is_active']=='' || $row['is_active']=='InActive'){
				
				header('location:login.php?message=Your Account is InActive');
			}
            }
				else{

			header("location:login.php?message=Incorrect Email or Password &color=red");

		    }

	}			

				

?>