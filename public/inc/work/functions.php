<?php
add_filter('the_content', 'convert_characters');
add_filter('the_title', 'convert_characters');

function convert_characters($content)
{
  // 全角数字を半角に 半角カタカナを全角に
  $content = mb_convert_kana($content, 'nK');

  $small = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
  $large = array_map('to_large_character', $small);
  $small_double = array_map('to_double_character', $small);
  $large_double = array_map('to_double_character', $large);

  $before = array_merge($small_double, $large_double);
  $after = array_merge($small, $large);
  $content = str_replace($before, $after, $content);

  return $content;
}

// 大文字に変換する
function to_large_character($str)
{
  return strtoupper($str);
}

// 全角文字に変換する
function to_double_character($str)
{
  return mb_convert_kana($str, 'A');
}
