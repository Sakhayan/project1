<?php 
	session_start();
	$connect = mysqli_connect("127.0.0.1", "root", "", "project1");
	$file_upload = 'img/' . basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $file_upload);	
	$ins = "INSERT INTO posts (name, studentid, img) VALUES ('".$_POST["desc"]."','".$_SESSION['student_id']."','".$file_upload."')";
	mysqli_query($connect, $ins);
	header('location:accountStudent.php');
 ?>