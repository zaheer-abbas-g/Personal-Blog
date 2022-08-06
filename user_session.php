<?
session_start();
if(!$_SESSION['user'])) 
{
	header("location:login.php?message=login first")
}
elseif ($_SESSION['user']) {
	header("location:index.php")
}

?>