<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
   $chooseadv = $_POST['chooseadv'];
      $choosetrip= $_POST['choosetrip'];
	$number = $_POST['number'];
   

	// Database connection
	$conn = new mysqli('localhost','root','','clientsdetails');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, chooseadv, choosetrip , number) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssi", $firstName, $lastName, $gender, $email  ,$chooseadv, $choosetrip , $number );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>