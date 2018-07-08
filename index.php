<?php 


		$connection = new MongoClient("mongodb://admin:admin123@ds131601.mlab.com:31601/mybot");
		
    			$collection = $connection->mybot->users;

			$document = $collection->findOne();
					echo "fuuuck offffff!";
			$var = "";

			var_dump( $document );
			$var = $document;



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
