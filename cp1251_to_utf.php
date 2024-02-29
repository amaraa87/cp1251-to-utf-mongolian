<?php
/*
=== CP1251 to UTF-8 Mongolian Cyrillic ===

Contributors: Amara
Plugin Name: CP1251 to UTF-8 Mongolian Cyrillic
Description: Converts Mongolian Cyrillic text from CP1251 to UTF-8.
Tags: wp, php, utf-8, converter, cp1251, mongolian, cryllic
License: GPL-2.0+
Text Domain: cp1251-to-utf8-mongolian
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 1.1
Version: 1.1
*/

function convert_cp1251_to_utf8($word)
{
    $cyrillic_mapping = array(
        'å' => 'е', 'ù' => 'щ', 'ô' => 'ф', 'ö' => 'ц', 'ó' => 'у', 'æ' => 'ж', 'ý' => 'э',
        'í' => 'н', 'ã' => 'г', 'ø' => 'ш', '¿' => 'ү', 'ç' => 'з', 'ê' => 'к', 'ú' => 'ъ',
        'é' => 'й', 'û' => 'ы', 'á' => 'б', 'º' => 'ө', 'à' => 'а', 'õ' => 'х', 'ð' => 'р',
        'î' => 'о', 'ë' => 'л', 'ä' => 'д', 'ï' => 'п', 'ÿ' => 'я', '÷' => 'ч', '¸' => 'ё',
        'ñ' => 'с', 'ì' => 'м', 'è' => 'и', 'ò' => 'т', 'ü' => 'ь', 'â' => 'в', 'þ' => 'ю',
        'Å' => 'Е', 'Ù' => 'Щ', 'Ô' => 'Ф', 'Ö' => 'Ц', 'Ó' => 'У', 'Æ' => 'Ж', 'Ý' => 'Э',
        'Í' => 'Н', 'Ã' => 'Г', 'Ø' => 'Ш', '¯' => 'Ү', 'Ç' => 'З', 'Ê' => 'К', 'Ú' => 'Ъ',
        'É' => 'Й', 'Û' => 'Ы', 'Á' => 'Б', 'ª' => 'Ө', 'À' => 'А', 'Õ' => 'Х', 'Ð' => 'Р',
        'Î' => 'О', 'Ë' => 'Л', 'Ä' => 'Д', 'Ï' => 'П', 'ß' => 'Я', '×' => 'Ч', '¨' => 'Ё',
        'Ñ' => 'С', 'Ì' => 'М', 'È' => 'И', 'Ò' => 'Т', 'Ü' => 'Ь', 'Â' => 'В', 'Þ' => 'Ю',
    );

    // Check if input is a string
    if (!is_string($word)) {
        return $word;
    }

    // Perform character conversion
    return strtr($word, $cyrillic_mapping);
}

function replace_content($data)
{
    global $post_ID;

    // Check if content, excerpt, or title is not empty before conversion
    if (!empty($data['post_content'])) {
        $data['post_content'] = convert_cp1251_to_utf8($data['post_content']);
    }

    if (!empty($data['post_excerpt'])) {
        $data['post_excerpt'] = convert_cp1251_to_utf8($data['post_excerpt']);
    }

    if (!empty($data['post_title'])) {
        $data['post_title'] = convert_cp1251_to_utf8($data['post_title']);
    }

    return $data;
}

add_filter('wp_insert_post_data', 'replace_content', 10);
