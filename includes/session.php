<?php
	include 'conn.php';
	session_start();

	if(isset($_SESSION['admin_5fe2562907c4eafe29b438c1c7ddb59c83211132932'])){
		header('location: modules/main_dashboard');
	}



?>