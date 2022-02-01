
<?php

//connect to database
$conn = mysqli_connect('localhost', 'info_bucket_admin', '1234567890', 'contact_crud');

// check connection
if (!$conn){
	echo "Connection Error" . mysqli_connect_error();
} 

?>

