<?php
require_once '../../../../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=../../../../google.json');
echo "HERE";
$client = new Google_Client();

$tokenCallback = function ($cacheKey, $accessToken) {
 	echo $accessToken;
};
$client->setTokenCallback($tokenCallback);

$client->useApplicationDefaultCredentials();

$client->addScope(Google_Service_Drive::DRIVE);
$client->setSubject("ros@swruk.org");

?>
