<?php 
namespace OceanWebTurk\SuperWeb;

use URL;

class Sitemap
{
  /**
  * @var array
  */
 public static $urls = [];

 public static function addUrl(string $url,string $changefreq = 'weekly',$newFileds = [])
 {
  self::$urls[$url] = array_merge(compact("changefreq"),$newFileds);
 }
 
 /**
  * @return string 
  */
 public static function output()
 {
  header("Content-Type: application/xml");
  $xml = '<?xml version="1.0" encoding="UTF-8"?>
  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

  foreach (self::$urls as $key => $value) {
    $xml.='
    <url><loc>'.$key.'</loc>';

    foreach($value as$k=>$v){
      $xml.='<'.$k.'>'.$v.'</'.$k.'>';
    }
  
    $xml.= '</url>';
  }

  return $xml.PHP_EOL.'</urlset>';
 }
}