<?php 

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

				$conn=mysqli_connect('localhost','root','NJOUBA','tunibot');

    			$query1 = "SELECT * FROM name";

    			$res=mysqli_query($conn, $query1);


    			while ($row=mysqli_fetch_array($res)) {

    				$speech = "$row["nom"]";

    			}
		return $speech;
			} else {
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
