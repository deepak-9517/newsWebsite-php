<?php
session_start();

// Generate a random code and store it in the session
$randomCode = substr(md5(rand(1000, 9999)),0,5);;
$_SESSION['CODE'] = $randomCode;

// Create an image with a white background
$image = imagecreatetruecolor(80, 30);
$bgColor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 15, 0, $bgColor);

// Set the text color to black
$textColor = imagecolorallocate($image, 0, 0, 0);

// Add the random code to the image
imagestring($image, 15, 15,5, $randomCode,$textColor);

// Set the content type header to display the image
header('Content-type: image/png');

// Display the image
imagepng($image);

// Free up memory
imagedestroy($image);
?>
