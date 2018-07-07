<?php 

				$conn=mysqli_connect('localhost','root','NJOUBA','tunibot');
				echo "connected!";
    			$query1 = "SELECT * FROM name";
    			echo "Selected!";
    			$res=mysqli_query($conn, $query1);
    			
    			
			while ($row=mysqli_fetch_array($res)) {
				echo $row["nom"];
			}



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
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
	
	if ($text == 'pass me a name from your database!') {

    			$speech = "hhhh". $row["nom"]."jjjjj";

	}
			 else {
				$speech = "fuck off!";
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
