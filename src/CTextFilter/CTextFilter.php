<?php
/**
 * A wrapper for various text filtering options.
 * 
 * @package MuffinPHP Core
 */

use \Michelf\MarkdownExtra;
define("CLICKABLE_TEST","This link should be clickable and links to my site http://www.student.bth.se/~alar12/phpmvc/kmom01/index.php");
define("MARKDOWN_TEST", "Header level 1 {#id1} 
===================== 

Here comes a paragraph. 

* Unordered list 
* Unordered list again 


Header level 2 {#id2} 
--------------------- 

Here comes another paragraph, now intended as blockquote. 

1. Ordered list 
2. Ordered list again 

> This should be a blockquote. 


###Header level 3 {#id3} 

Here will be a table. 

| Header 1 | Header 2 | Header 3 | Header 4 | 
|----------|:-------------|:--------:|--------------:| 
| Data 1 | Left aligned | Centered | Right aligned | 
| Data | Data | Data | Data | 

Here is a paragraph with some **bold** text and some *italic* text and a [link to dbwebb.se](http://dbwebb.se). ");

class CTextFilter {

public static $purify = null;

/**
 * Make clickable links from URLs in text.
 *
 * @param string text text to be converted.
 * @return string the formatted text.
 */
public static function MakeClickable($text) {
return preg_replace_callback(
    '#\b(?<![href|src]=[\'"])https?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
   // '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', 
    create_function('$matches','return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";'),
    $text
);
}
 
/**
 * Format text according to Markdown syntax.
 *
 * @param string $text the text that should be formatted.
 * @return string as the formatted html-text.
 */
public static function markdown($text) {
  require_once(__DIR__ . '/php-markdown/Michelf/Markdown.php');
  require_once(__DIR__ . '/php-markdown/Michelf/MarkdownExtra.php');
  return MarkdownExtra::defaultTransform($text);
}

/**
* Support SmartyPants for better typography. 
*
* @param string text text to be converted.
* @return string the formatted text.
*/
public static function smartyPantsTypographer($text) {   
  require_once(__DIR__ . '/php-smartypants-typographer/smartypants.php');
  return SmartyPants($text);
}

public static function testlibrary(){

$pantsTest = <<<EOD
This is "double quotation marks". These are 'single quotation marks'. This is a -- n dash. This should be an ellipse...
EOD;

  $testData = array( 
  'clickable'=> self::MakeClickable(CLICKABLE_TEST), 
  'markdown'=> self::markdown(MARKDOWN_TEST),
  'smartpants' => self::smartyPantsTypographer($pantsTest),
  ); 

  return $testData;
}

/**
 * Clean your HTML with HTMLPurifier, create an instance of HTMLPurifier if it does not exists. 
 *
 * @param $text string the dirty HTML.
 * @return string as the clean HTML.
 */
public static function Purify($text) { 
   if(!self::$purify) {
    require_once(__DIR__.'/htmlpurifier-4.5.0-standalone/HTMLPurifier.standalone.php'); 
    $config = HTMLPurifier_Config::createDefault(); 
    $config->set('Cache.DefinitionImpl', null); 
    self::$purify = new HTMLPurifier($config);
  } 
  return self::$purify->purify($text);
} 

/**
* Helper, BBCode formatting converting to HTML.
*
* @param string text The text to be converted.
* @returns string the formatted text.
*/
public static function bbcode2html($text) {
  $search = array( 
    '/\[b\](.*?)\[\/b\]/is', 
    '/\[i\](.*?)\[\/i\]/is', 
    '/\[u\](.*?)\[\/u\]/is', 
    '/\[img\](https?.*?)\[\/img\]/is', 
    '/\[url\](https?.*?)\[\/url\]/is', 
    '/\[url=(https?.*?)\](.*?)\[\/url\]/is' 
    );   
  $replace = array( 
    '<strong>$1</strong>', 
    '<em>$1</em>', 
    '<u>$1</u>', 
    '<img src="$1" />', 
    '<a href="$1">$1</a>', 
    '<a href="$1">$2</a>' 
    );     
  return preg_replace($search, $replace, $text);
}

}