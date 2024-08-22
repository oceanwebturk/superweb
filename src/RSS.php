<?php 
namespace OceanWebTurk\SuperWeb;

use URL;

class RSS
{
  /**
  * @var array
  */
 public static $items = [];

 public static function addItem(array $item = [])
 {
  self::$items[] = $item;
 }
 
 /**
  * @return string 
  */
 public static function output($options = [])
 {
  header("Content-Type: application/xml");
  $xml = '<?xml version="1.0" encoding="UTF-8"?>
  <rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/">
  <channel> 
  ';

  /*

<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
<title>Example RSS Feed</title>
<link>https://example.com/feed/</link>
<description>This is an example of an RSS feed.</description>
<item>
<title>First Item</title>
<link>https://example.com/first-item/</link>
<description>This is the description of the first item.</description>
<pubDate>Mon, 01 Jan 2024 00:00:00 +0000</pubDate>
</item>
<item>
<title>Second Item</title>
<link>https://example.com/second-item/</link>
<description>This is the description of the second item.</description>
<pubDate>Tue, 02 Jan 2024 00:00:00 +0000</pubDate>
</item>
</channel>
</rss>
  
  */

  foreach ($options as $key => $value) {
    $xml .= '<'.$key.'>'.$value.'</'.$key.'>
    ';
  }

  return $xml.PHP_EOL.'</channel></rss>';
 }
}