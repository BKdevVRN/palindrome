<?php

public function findPalin($text = '') {
	if( empty($text) ) return 'Строка пуста';
	//все буквы мелкими делаем
	$text = mb_strtolower($text, 'UTF-8');
	//удалим пробелы
	$text = str_replace(' ', '', $text);
	/**
     * MAGIC
     */
	$revText = iconv('utf-8', 'windows-1251', $text);
	$revText = strrev($revText);
	$revText = iconv('windows-1251', 'utf-8', $revText);

	//Сама строка у нас является палиндромом
	if($text == $revText) {
		return $text;
	}

	//Размер половины
	$halfSize = floor(strlen($text) / 2 );
	//Ищем под-палиндром в половине строки
	for( $i = 0; $i < $halfSize; $i++) {
		$subStrLen = $halfSize - $i;
		for($k = 0; $k < $halfSize - $subStrLen; $k++) {
			if(substr($text, $k, $subStrLen) == substr($revText, $k, $subStrLen)) {
				return substr($text, $k, $subStrLen);
			}
		}
	}
	return $text[0];
}

?>