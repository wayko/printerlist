<?php
$name = $_POST['name'];
$problem = $_POST['problem'];
$timedate = $_POST['timedate'];
$requester = $_POST['requestor'];
define("ZDAPIKEY", "nTaIRDkoCKxyOPnpm3cQO9yf9iUrVhV94FnE4pIp");
define("ZDUSER", "jortiz@tcicollege.edu");
define("ZDURL", "https://tcicollege.zendesk.com/api/v2");

function curlWrap($url, $json, $action)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	curl_setopt($ch, CURLOPT_URL, ZDURL.$url);
	curl_setopt($ch, CURLOPT_USERPWD, ZDUSER."/token:".ZDAPIKEY);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	switch($action){
		case "POST":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			break;
		case "GET":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			break;
		case "PUT":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		default:
			break;
	}
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	$output = curl_exec($ch);
	echo 'Curl Output: ' . curl_error($ch);
	curl_close($ch);
	$decoded = json_decode($output);
	return $decoded;
}




	
	$arr = array("z_subject"=> $problem,
	   "z_description"=> $problem,
	   "z_recipient"=> "helpdesk@tcicollege.edu",
	   "z_name"=> $requester,
	   "z_requester"=> $requester
	  );
$create = json_encode(array('ticket' => array('subject' => $arr['z_subject'], 'description' => $arr['z_description'], 'requester' => array('name' => $arr['z_name'], 'email' => $arr['z_requester']))));

$url = '/tickets.json';
$data = curlWrap($url, $create, 'POST');
print $create;

?>
