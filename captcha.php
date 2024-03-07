<?php 

session_start();


$image_width = 150;

$image_height = 50;

$characters_on_image = 6;

$font = 'images/monofont.ttf';

$possible_letters = 'abcdfghjkmnpqrstvwxyz123456789ABC';

$random_dots = 10;

$random_lines = 30;

$captcha_text_color="4caf50";

$captcha_noice_color = "7fbf4d";

$code = '';

$i = 0;

while ($i < $characters_on_image){ $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);$i++;}

$font_size = $image_height * 0.75;

$image = @imagecreate($image_width, $image_height);

$background_color = imagecolorallocate($image, 255, 255, 255);

$arr_text_color = RGB_HEX($captcha_text_color);

$text_color = imagecolorallocate($image, $arr_text_color['red'], 

$arr_text_color['green'], $arr_text_color['blue']);

$arr_noice_color = RGB_HEX($captcha_noice_color);

$image_noise_color = imagecolorallocate($image, $arr_noice_color['red'], 

$arr_noice_color['green'], $arr_noice_color['blue']);

for( $i=0; $i<$random_dots; $i++ ){imagefilledellipse($image, mt_rand(0,$image_width),mt_rand(0,$image_height), 2, 3, $image_noise_color);}

for( $i=0; $i<$random_lines; $i++ ){imageline($image, mt_rand(0,$image_width), mt_rand(0,$image_height),mt_rand(0,$image_width), mt_rand(0,$image_height), $image_noise_color);}

$textbox = imagettfbbox($font_size, 0, $font, $code);

$x = ($image_width - $textbox[4])/2;

$y = ($image_height - $textbox[5])/2;

imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code);

header('Content-Type: image/jpeg');

imagejpeg($image);

imagedestroy($image);

$_SESSION['captcha_code']=$code;

function RGB_HEX ($hexstr)

{$int = hexdec($hexstr);return array("red" => 0xFF & ($int >> 0x10),"green" => 0xFF & ($int >> 0x8),"blue" => 0xFF & $int);} ?>