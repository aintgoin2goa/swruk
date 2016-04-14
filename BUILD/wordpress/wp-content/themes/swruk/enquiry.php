<?php
require "../../../wp-load.php";
require "aws/aws-autoloader.php";

if(!array_key_exists('uri', $_POST)){
	exit();
}

$admin_email = 'paul.wilson66@gmail.com';


$ses = new Aws\Ses\SesClient([
    'version' => 'latest',
    'region'  => 'eu-west-1'
]);



$allowed_html = array();

$errors = array();
$has_error = false;

$name = trim(wp_kses($_POST['name'], $allowed_html));
$email = trim(wp_kses($_POST['email'], $allowed_html));
$message = trim(wp_kses($_POST['message'], $allowed_html));

$message_paras = explode("\n", $message);
$message_body = '<p>' . implode('</p><p>', $message_paras) . '</p>';

$html_message = <<<HTML_BODY
<html>
	<body>
		{$message_body}
	</body>
</html>
HTML_BODY;


if($name === ''){
	$errors['name'] = 'Please give your name';
	$has_error = true;
}

if($email === ''){
	$errors['email'] = 'Please give your email';
	$has_error = true;
}

if($message === ''){
	$errors['message'] = 'Please write a message';
	$has_error = true;
}

if( !array_key_exists('email', $errors) && !is_email($email) ){
	$errors['email'] = 'Please give a valid email';
	$has_error = true;
}

function get_email_text($text){
	return [
		'Charset' => 'UTF8',
		'Data' => $text
	];
}


if(has_error === true){
	$url_parts = array();
    foreach($errors as $field=>$message){
    	$url_parts[] = urlencode($message);
    }

    $url = '?errors=' .urlencode(implode(',', $url_parts));
    header('Location: ' . $_POST['uri'] . $url);
}else{
	try{
		$result = $ses->sendEmail([
        		'Destination' => [
        			'ToAddresses' => [$admin_email]
        		],
        		'Message' => [
        			'Subject' => get_email_text('Enquiry from swruk.org'),
					'Body' => [
						'Html' => get_email_text($html_message),
						'Text' => get_email_text($message)
					]
        		],
        		'ReplyToAddresses' => [$email],
        		'Source' => 'paul.wilson66@gmail.com'
        	]);
		print('Email sent');
	}catch(Exception $e){
		print_r( $e);
	}

}




?>
