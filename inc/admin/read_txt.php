<?php 

function read_txt($name)
{
	$i = 0;
	$open = fopen($name, 'r');
	if ($open)
	{
		while (!feof($open))
		{
			$line = fgets($open);
			$tab_line[$i] = trim($line);
			$i++;
		}
		fclose($open);
		return $tab_line;
	}
	return -1;
}