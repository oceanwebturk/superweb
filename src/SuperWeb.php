<?php 
namespace OceanWebTurk\SuperWeb;

use URL;

class SuperWeb extends Seo
{
 
 /**
  * @var array
  */
 public static $content = [];

 /**
  * @return mixed
  */
 public static function seo()
 {
  return new Seo();
 }
 
 /**
  * @return array
  */
 public static function getInfo()
 {
  return self::$data;
 }

 public static function getConfig()
 {
  return self::$configs;
 }
 
 /**
  * @return string
  */
 public static function generate()
 {
  self::$content[] = '<meta name="header" content="global-navigation"><meta name="target" content="on"><meta name="view-transition" content="same-origin"><link rel="profile" href="https://gmpg.org/xfn/11">
  '.Seo::generate().'<meta name="author" content="'.(isset(self::$configs['author']) ? self::$configs['author'] : (isset(self::$configs['default_author']) ? self::$configs['default_author'] : '')).'">
  <base href="'.site_url().'"><link rel="canonical" href="'.self::defaultControl('canonical',URL::canonical()).'"><link type="application/json" rel="manifest" href="'.(str_replace(["{SITE_URI}"],[site_url()],(isset(self::$configs['manifest_uri']) ? self::$configs['manifest_uri'] : '{SITE_URI}site.webmanifest'))).'" crossorigin="use-credentials">';

  self::$content[] = '<meta name="HandheldFriendly" content="true">
  <meta name="MobileOptimized" content="width"><meta name="showInMobile" content="true"><meta name="footer" content="global-footer"><meta name="searchNavigationTab" content="Other"><meta name="google-site-verification" content="'.self::defaultControl('google-site-verify-code').'">
  ';

  self::$content[] = '<script>if("serviceWorker" in navigator){window.addEventListener("load",function(){navigator.serviceWorker.register("'.(str_replace(["{SITE_URI}"],[site_url()],(isset(self::$configs['sw_uri']) ? self::$configs['sw_uri'] : '{SITE_URI}sw.js'))).'");});}</script><meta name="theme-color" content="'.self::defaultControl('theme-color','black').'">
  <meta name="mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="hostname" content="'.URL::host().'"><meta name="expected-hostname" content="'.URL::host().'">
  ';
  
  if(isset(self::$configs['alternateLangTags'])){
   $langContent = '';
   foreach (self::$configs['alternateLangTags']as$lang=>$url){
    $langContent.= '<link rel="alternate" hreflang="'.$lang.'" href="'.$url.'">';
   }
   self::$content = array_merge(self::$content,[$langContent]);
  }

  if(isset(self::$configs['rssLink'])){
   $rssLinkContent = '';
   foreach (self::$configs['rssLink']as$link=>$title){
    $rssLinkContent.= '<link rel="alternate" type="application/rss+xml" title="'.$title.'" href="'.$link.'" >
    ';
   }
   self::$content = array_merge(self::$content,[$rssLinkContent]);
  }
  
  echo str_replace('  ','',implode("",self::$content));
 }

 public static function description(string $description)
 {
  self::$data['description'] = $description;
  return new self;
 }
 
 /**
  * @param string $url
  * @param string $lang
  * @return mixed
  * */
 public static function alternateLangTag(string $url,string $lang = 'x-default')
 {
  self::$configs['alternateLangTags'][$lang] = $url;
  return new self();
 }

 public static function rssLink(string $link,string $title)
 {
  self::$configs['rssLink'][$link] = $title;
  return new self();
 }
}