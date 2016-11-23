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

function generate_Name($alea)
{
	$i = 0;
	$open = fopen(DIR_PLUGIN.'nom.txt', 'r');
	if ($open)
	{
		while ($i < $alea)
		{
			$line = fgets($open);
			$i++;
		}
		fclose($open);
		return $line;
	}
	return -1;
}