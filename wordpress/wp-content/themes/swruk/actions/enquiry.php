<?php
require "../../../../wp-load.php";

if(!array_key_exists('uri', $_POST)){
	exit();
}

//$admin_email = 'ros@swruk.org';
$admin_email = 'paul.wilson66@gmail.com';


$allowed_html = array();

$errors = array();
$has_error = false;

$name = trim(wp_kses($_POST['name'], $allowed_html));
$email = trim(wp_kses($_POST['email'], $allowed_html));
$message = trim(wp_kses($_POST['message'], $allowed_html));

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
	$to = $admin_email;
	$subject = 'Enquiry from swruk.org';
	$message = $message . "\n\n" . "From: " . $name;
	$headers = array("Reply-To: {$email}");
	wp_mail($to, $subject, $message, $headers);
	header('Location: /contact?messagesent=true');
}




?>
