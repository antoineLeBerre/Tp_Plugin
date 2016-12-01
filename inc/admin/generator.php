<?php 

function generator($code, $option = array())
{
	/* 
	* Function permmettant de generer les differents champs 
	* $code = le type de generateur que l'on veut (0 = generateur de lettre, 1 = generateur de chiffre, 2 = generateur de nom ( depuis un fichier) et 3 = generateur d'email)
	* $option = tableau regroupant 2 options, le nombre de mots et le nom pour le champ email
	* Si $option est vide alors le nombre de mot = 1 et le nom = rand du fichier tct
	*/

	$characters_maj = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = read_txt(DIR_PLUGIN.'nom.txt');
    $extension = ["com", "fr", "org", "net"];
    $random_string = "";
    $i = 0;

    if ($code == 0) {
    	$random_string = $characters_maj[rand(0, strlen($characters_maj) - 1)];
    	if (isset($option["word"])) {
    		while ($i < $option["word"]) {
    			$length = rand(2, 7);
    			$random_string .= do_generate(0, $length);
    			if ($i < $option["word"] - 1) {
        			$random_string .= " ";
        		}
        		$i++;
    		}		
    		return $random_string;
    	}
    	$length = rand(1, 6);
    	$random_string .= do_generate(0, $length);
    	return $random_string;
    }
    elseif ($code == 1) {
    	if (isset($option["length"])) {
    		$random_digit = do_generate(1, $option["length"]);
    		return $random_digit;
    	}
    	$length = rand(4, 6);
    	$random_digit .= do_generate(1, $length);
    	return $random_digit;
    }
    elseif ($code == 2) {
    	$random_name = $name[rand(0, sizeof($name) - 1)];
    	return $random_name;
    }
    elseif ($code == 3) {
        $random_email = $random_string;
    	$length = rand(4, 6);
    	$random_string = do_generate(0, $length);
    	$random_extension = $extension[rand(0, sizeof($extension) - 1)];
    	$random_name = do_generate(0, $length);

    	if (isset($option["name"])) {
    		$random_email .= $option["name"].'@'.$random_string.".".$random_extension;
    		
    		return $random_email;
    	}
    	
    	$random_email .= $random_name.'@'.$random_string.".".$random_extension;
    		
    	return $random_email;
    }

}

function do_generate($code, $length)
{
	/*
	* Function permettant de faire un mot generer aleatoirement
	* $code : 0 = texte, 1 = chiffre
	* $length : la longueur du champs
	*/
	$characters_min = "abcdefghijklmnopqrstuvwxyz";
	$digit = "0123456789";
	$string = "";

	if ($code == 0) {
		for ($j = 0; $j < $length; $j++) {
        	$string .= $characters_min[rand(0, strlen($characters_min) - 1)];			
    	}
    	return $string;
	}
	if ($code == 1) {
		for ($j = 0; $j < $length; $j++) {
        	$string .= $digit[rand(0, strlen($digit) - 1)];			
    	}
    	return $string;
	}
	
}