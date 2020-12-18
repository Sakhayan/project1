<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', 'project1');
	$query = mysqli_query($con, "SELECT * FROM adminUn WHERE login ='{$_POST['login']}' AND password='{$_POST['password']}'");
	$stroka = $query->fetch_assoc();
	$_SESSION['admin_id'] = $stroka['id'];
	header("location:accountAdmin.php");
 ?>