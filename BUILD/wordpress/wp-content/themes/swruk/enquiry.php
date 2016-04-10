<?php
include "../../../wp-load.php";

if(!array_key_exists('uri', $_POST)){
	exit();
}


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


if(has_error === true){
	$url_parts = array();
    foreach($errors as $field=>$message){
    	$url_parts[] = urlencode($message);
    }

    $url = '?errors=' .urlencode(implode(',', $url_parts));
    header('Location: ' . $_POST['uri'] . $url);
}


echo 'SEND EMAIL';

?>
