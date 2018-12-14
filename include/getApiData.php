<?php
	include 'config.php';
	include 'getLogo.php';

	function callAPI($method, $url, $data){
		$curl = curl_init();

		switch ($method){
			case "POST":
			    curl_setopt($curl, CURLOPT_POST, 1);
			    if ($data)
			       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			    break;
		  	case "PUT":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                       
			break;
		default:
 			if ($data)
		    $url = sprintf("%s?%s", $url, http_build_query($data));
		}

	   // OPTIONS:
	   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
	   curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	      'X-CMC_PRO_API_KEY: fd9e63c3-7821-4940-b9d9-2d998ece6f8d',  // <-------API KEY
	      //'Content-Type: application/json',
	      'Accept: application/json',
	      //'Accept-Encoding: deflate, gzip',
	   ));
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	   // EXECUTE:
	   $result = curl_exec($curl);
	   if(!$result){die("Connection Failure");}
	   curl_close($curl);
	   return $result;
	}

	//Data request
	$get_data = callAPI('GET', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', false);
	$response = json_decode($get_data, true);

	//UPDATE DATABASE
	foreach($response["data"] as $row){
		$sql = "UPDATE ico_data SET START_DATE='".$row['date_added']."', END_DATE='".$row['last_updated']."', CURRENT_PRICE='".$row['quote']['USD']['price']."' WHERE API_ID='".$row['id']."'";

		mysqli_query($conn, $sql);
	}
	if(!mysqli_query($conn,$sql)){
		die('Error : ' . mysqli_error($conn));
	}


	//Combine slug and logo arrays as key => value
	$combinedArray = array();
	foreach(array_combine($symbolArray, $logoArray) as $symbol => $logo){
   		$combinedArray["$symbol"] = $logo;
	}
	include 'insertToLogTable.php';

	foreach($combinedArray as $key => $value){
	    //IF DATABASE IS EMPTY, WHERE CLAUSE WON'T WORK
		$sql = "UPDATE ico_images SET SLUG='$key', URL='$value' WHERE SLUG='$key'";
		mysqli_query($conn, $sql);
	}

	if(!mysqli_query($conn,$sql)){
		die('Error : ' . mysqli_error($conn));
	}

?>