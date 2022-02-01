<!-- create.php -->
<?php 

include('../env/db_connect.php');
session_start();


$_SESSION['errors'] = [];


if (isset($_POST['submit'])){

	$id = $_POST['id'];

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$message = $_POST['message'];

	function validateData ($name, $email, $phone, $address, $message){
		if (empty($name)){
			$_SESSION['errors']['name'] = "Name can not be empty";
		}
		else if (empty($email)){
			$_SESSION['errors']['email'] = "email can not be empty";
		}
		else if (empty($phone)){
			$_SESSION['errors']['phone'] = "phone can not be empty";
		}
		else if (empty($address)){
			$_SESSION['errors']['address'] = "address can not be empty";
		}
		else if (empty($message)){
			$_SESSION['errors']['message'] = "message can not be empty";
		}
	}

	validateData($name, $email, $phone, $address, $message);


	if(count($_SESSION['errors'])){
		echo "Forms Cannot be submitted";
	}

	else {

		$query = "UPDATE data SET name='$name', email='$email', phone= '$phone', address= '$address',message= '$message'  WHERE id=$id"  ;

		$result = mysqli_query($conn, $query);
		if ($result){
			echo "data updated";
			header("Location: ../show.php");
		}
		else {
			echo "Cannot update data";
		}
	}
}



?><!-- update.php -->