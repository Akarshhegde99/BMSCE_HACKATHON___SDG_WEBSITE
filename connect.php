<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 


	
    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);

    // Execute the statement
    $execval = $stmt->execute();

    // Check if the execution was successful
    if ($execval) {
        echo "Registration successfully...";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

		// $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		// $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		// $execval = $stmt->execute();
		// echo $execval;
		// echo "Registration successfully...";
		// $stmt->close();
		// $conn->close();
	
?>