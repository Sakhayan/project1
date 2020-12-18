<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', 'project1');
	$query = mysqli_query($con, "SELECT * FROM students WHERE phone ='{$_POST['phone']}' AND password='{$_POST['password']}'");
	$stroka = $query->fetch_assoc();
	$_SESSION['student_id'] = $stroka['id'];
	header("location:accountStudent.php");
 ?>