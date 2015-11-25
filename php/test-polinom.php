<?php
/*
 * Предполагается что:
 * - пробелы учитываются (иначе разкоментируем )
 * - регистр не учитывается
 * - данные поступают из поля 'inputText', возвращаются в виде html.
 */


$inputText = $_POST['inputText'] ;
$strEncode = mb_detect_encoding($inputText);
//$inputText = str_replace(" ","", $inputText);
$string = mb_strtolower($inputText, $strEncode);
$strLenght = mb_strlen($string, $strEncode );
$result = mb_substr($string, 0, 1, $strEncode);

// верно для однобайтных и многобайтных строк/кодировок:
for($pos=0; $pos< $strLenght -1; $pos++){	
	for($lenght=$strLenght-$pos; $lenght >=2; $lenght--){		
		$substr = mb_substr ($string, $pos, $lenght, $strEncode);
		$polynom = TRUE;
		
		for ($i = 0; $i <= $lenght / 2 - 1; $i++){ 
			if( !(mb_substr($substr, $i, 1, $strEncode) == mb_substr($substr, $lenght-$i-1, 1, $strEncode)) ){
				$polynom = FALSE;
				break;
			}
		}
		
		if($polynom && $lenght > mb_strlen($result, $strEncode) ){
			$result = $substr;
			if($lenght == $strLenght){
				break 2;
			}
		}
		if($polynom){break;}
	}
}

echo  $result  ;

?>

/*
// верно для однобайтных строк/кодировок
for($i=0; $i< $strLenght -1; $i++){	
	for($x=$strLenght-$i; $x >=2; $x--){		
		$substr = substr($string, $i, $x);
		$revSubstr = strrev( $substr );
		
		if ( !strcasecmp($substr, $revSubstr) && strlen($substr)>strlen($result)){
			$result = $substr;
			if ($i==0 && strlen($result)>1){ break 2; }
		}
	}
}*/

