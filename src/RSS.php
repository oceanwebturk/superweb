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
  header("Content-Type: application/xml; charset=UTF-8");
  $xml = '<?xml version="1.0" encoding="UTF-8"?>
  <rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" 
  xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
  xmlns:slash="http://purl.org/rss/1.0/modules/slash/">
  <channel> 
  ';

  foreach ($options as $key => $value) {
    $xml .= '<'.$key.'>'.$value.'</'.$key.'>
    ';
  }

  $xml.= '<generator>https://oceanwebturk.com</generator>
  ';
  
  $xml.= '<item>';

  foreach(self::$items as $item => $field)
  {
   foreach($field as $k => $v)
   {
    $xml .= ' <'.$k.'>'.$v.'</'.$k.'>
    ';
   }
  }

  $xml.= '</item>';

  return $xml.PHP_EOL.'</channel></rss>';
 }
}