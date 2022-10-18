<?php
	$question = $_POST['question'];
	
	$conn = new mysqli('localhost','root','','questions');

    // Database connection
	//host : localhost
	//username : root
	//password :
	//dbname : questions
	//tablename : users 

	if ($conn->connect_error) {

		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);

		
	}

	/** Adding the valid input to the database*/
	else {
		$stmt = $conn->prepare("insert into users(question) values(?)");
		$stmt -> bind_param ("s",$question);
		$execval = $stmt->execute();
		echo $execval;
		echo "Captured  successfully...";
		$stmt->close();
		$conn->close();
	}



    


?> 