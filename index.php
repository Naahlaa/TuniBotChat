<?php 

				$conn=mysqli_connect('localhost','root','NJOUBA','tunibot');
				echo "connected!";
    			$query1 = "SELECT * FROM name";
    			echo "Selected!";
    			$res=mysqli_query($conn, $query1);
				$var=array();
    			if (isset($res)) {
    				$row=mysqli_fetch_array($res);
					echo "selected name: ".$row["nom"];
					$var[] = $row["nom"];
				var_dump($var);
    			}
    			
		
					echo "fuuuck offffff!";
					 var_dump($var);



$method = $_SERVER['REQUEST_METHOD'];
		

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'pass a name from your database!':
			$speech = "Bye, good night " . " " . $var;
			break;
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
	

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

 

?>
