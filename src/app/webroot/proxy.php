<?php

$url = ($_POST['url']) ? $_POST['url'] : $_GET['url'];
$headers = ($_POST['headers']) ? $_POST['headers'] : $_GET['headers'];

$ext = substr(strrchr($url, '.'), 1);


switch ($ext) {
	case 'gif':
		$mimeType = "image/gif";
		break;

	case 'png':
		$mimeType = "image/png";
		break;

	case 'jpg':
		$mimeType = "image/jpg";
		break;

	case 'jpeg':
		$mimeType = "image/jpg";
		break;

	default:
		$mimeType = "image/png";
		break;
}

try {

	$file = file_get_contents($url);
	$file64 = base64_encode($file);

} catch (Exception $e) {
	$mimeType = "image/gif";
	$file64 = "R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";
}

$callback = $_GET['callback'];

$image = "data:" . $mimeType . ";base64,". $file64;

$response = $callback."(".json_encode($image).")";


echo $response;