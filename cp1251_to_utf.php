<?php 
/*
=== cp1251 to utf8 Mongolian cryllic ===

Contributors: Amarsanaa J
Plugin Name: cp1251 to utf8 Mongolian cryllic
Plugin URI: webipress.com
Tags: wp, php, utf-8, converter, cp1251, mongolian , cryllic
Author URI: http://webipress.com
Author: WebiPress
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 1.0
Version: 1.0 

*/
function cp1251_utf8($word)
{
$cyr_lower_chars = array(
'е','щ','ф','ц','у','ж','э',
'н','г','ш','ү','з','к','ъ',
'й','ы','б','ө','а','х','р',
'о','л','д','п','я','ч','ё',
'с','м','и','т','ь','в','ю',);

$latin_lower_chars = array(
'å','ù','ô','ö','ó','æ','ý',
'í','ã','ø','¿','ç','ê','ú',
'é','û','á','º','à','õ','ð',
'î','ë','ä','ï','ÿ','÷','¸',
'ñ','ì','è','ò','ü','â','þ',);

$cyr_upper_chars = array(
'Е','Щ','Ф','Ц','У','Ж','Э',
'Н','Г','Ш','Ү','З','К','Ъ',
'Й','Ы','Б','Ө','А','Х','Р',
'О','Л','Д','П','Я','Ч','Ё',
'С','М','И','Т','Ь','В','Ю',);

$latin_upper_chars = array(
'Å','Ù','Ô','Ö','Ó','Æ','Ý',
'Í','Ã','Ø','¯','Ç','Ê','Ú',
'É','Û','Á','ª','À','Õ','Ð',
'Î','Ë','Ä','Ï','ß','×','¨',
'Ñ','Ì','È','Ò','Ü','Â','Þ',);

//replacing lower cyrillic
$word = str_replace($latin_lower_chars, $cyr_lower_chars, $word);
//replacing upper cyrillic
$word = str_replace($latin_upper_chars, $cyr_upper_chars, $word);
return $word;
}

function replacecontent($data) {
    global $post_ID;

    $data['post_content'] = cp1251_utf8($data['post_content']);
	$data['post_excerpt'] = cp1251_utf8($data['post_excerpt']);
	$data['post_title'] = cp1251_utf8($data['post_title']);
    return $data;
}

add_filter('wp_insert_post_data', 'replacecontent', 10);
