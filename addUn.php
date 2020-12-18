<?php 
	session_start();
	$connect = mysqli_connect("127.0.0.1", "root", "", "project1");
	$query = mysqli_query($connect, "SELECT * FROM universities WHERE id = {$_POST['id']}");
	$result = $query->fetch_assoc();
	$ins = "INSERT INTO applicatinos (idUn, studentid, name) VALUES ('".$_POST["id"]."','".$_SESSION['student_id']."','".$result['name']."')";
	mysqli_query($connect, $ins);
	header('location:index.php');
 ?>