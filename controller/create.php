<!-- create.php -->
<?php 

include('../env/db_connect.php');
session_start();


$_SESSION['errors'] = [];

if (isset($_POST['submit'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$message = $_POST['message'];

	echo "we recived the data";
	// exit();


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
		$query = " INSERT INTO data (name, email, phone, address, message)
	VALUES ('$name', '$email', '$phone', '$address', '$message')" ;
		$result = mysqli_query($conn, $query);
		if ($result){
			header('Location: ../show.php');
		}
		else {
			echo "There is a problem";
		}
	}
}

else {
	echo "not submit";
}




?>