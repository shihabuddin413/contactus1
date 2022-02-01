<!-- delete.php -->

<?php 

	include('../env/db_connect.php');


     $id = $_GET['id'];

	 $sql = "DELETE FROM data WHERE id=$id";
	 mysqli_query($conn, $sql);

	 header("Location: ../show.php");

?>
