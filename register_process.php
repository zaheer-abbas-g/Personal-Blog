<?php 
		include_once("connection/connection.php");
		if (isset($_REQUEST['submit_register'])) {		
				
				$first_name=$_REQUEST['first_name'];	
				$last_name=$_REQUEST['lastname'];	
				$email=$_REQUEST['email'];	
				$password=$_REQUEST['password'];	
				$gender=$_REQUEST['gender'];	
				$address=$_REQUEST['address'];	
				$date_of_birth=$_REQUEST['date_of_birth'];
				$image = $_FILES['image']['name'];
				$image_size = $_FILES['image']['size'];
			    $image_tmp_name = $_FILES['image']['tmp_name'];
			    $image_folder = 'upload_image/'.$image;
			    
			    
				$select = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
			   if(mysqli_num_rows($select)>0){
			     header('location:register.php?message=user already exist'); 
			   }
				elseif($image_size>  1048576){
		         header("location:register.php?message=Image  size must be 1MB!");
		        }
				else{
				move_uploaded_file($image_tmp_name, $image_folder);
						header("location:login.php?msg=You are Succefully Registered");	
				$query="INSERT INTO user(first_name,last_name,email,password,gender,date_of_birth,user_image,address)VALUES('$first_name','$last_name','$email','$password','$gender','$date_of_birth','$image','$address')";		
				$result=mysqli_query($connect,$query);
				if ($result) 
				{
					$query="UPDATE user SET role_id=2 ,is_active='Active'where email='".$_REQUEST['email']."'";
					$result=mysqli_query($connect,$query);
					}
	        	 }
			

		    	}




		/*Server Side Validation*/

		$is_validate = true;
		$error_messages = "";
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$address = $_REQUEST['address'];
		$date_of_birth=$_REQUEST['date_of_birth'];
		$gender = false;

		if(isset($_REQUEST['gender'])){
			$gender = $_REQUEST['gender'];
		}

		$name_pattern = "/^[a-z]{3,15}$/i";
		$email_pattern = "#^[a-z0-9]{3,15}@[a-z]{5,10}\.(com|org)$#i";
		$address_pattern = "/^[\w\W]{10,100}$/";

		if($first_name == ""){
			$is_validate = false;
			$error_messages .= "<li><p style='color:red;'>First Name: Please Enter First Name</p></li>";
		}
		elseif(!preg_match($name_pattern,$first_name)){
			$is_validate = false;
			$error_messages .= "<li><p style='color:red;'>First Name: First Name Should Contain only Alphabets range[3-15]</p></li>";
		}

		if($last_name != ""){
			if(!preg_match($name_pattern,$last_name)){
				$is_validate = false;
				$error_messages .= "<li><p style='color:red;'>Last Name: Last Name Should Contain only Alphabets range[3-15]</p></li>";
			}
		 }

		if($email == ""){
			$is_validate = false;
			$error_messages .= "<li><p style='color:red;'>Email: Please Enter Email Address</p></li>";
		 }
		elseif(!preg_match($email_pattern,$email)){
			$is_validate = false;
			$error_messages .= "<li><p style='color:red;'>Email: Email Should Be Like: abc@gmail.com</p></li>";
		}


		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
		    $error_messages .="<li><p style='color:red;'>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character</p></li>";
		}else{
		    $error_messages .="<li><p style='color:red;'>Strong password</p></li>";
		}
		if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date_of_birth)) {
		     $error_messages .="<li><p style='color:red;'>Valid Date Formate</p></li>";
		} else {
		    $error_messages .="<li><p style='color:red;'>Pick your date of birth</p></li>";
		}

		if(!$is_validate){
			header("location:register.php?error_messages=".$error_messages);
		}
	

 ?>


