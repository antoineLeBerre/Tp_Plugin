<?php 

function generateRandomString($length) {
    $characters_maj = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters_min = "abcdefghijklmnopqrstuvwxyz";
    $randomString = $characters_maj[rand(0, strlen($characters_maj) -1)];
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters_min[rand(0, strlen($characters_min) - 1)];
    }
    return $randomString;
}

function generate_Name()
{
	$ouvrir = fopen(DIR_PLUGIN.'nom.txt', 'r');
	$lire = fgets($ouvrir);
	fclose($ouvrir);
	var_dump($lire);
}