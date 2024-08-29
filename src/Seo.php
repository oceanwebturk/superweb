<?php 
namespace OceanWebTurk\SuperWeb;

use URL;

class Seo
{
 /**
  * @var array
  */
 public static $data = [];
 
 /**
  * @var array
  */
 public static $configs = ['default_title' => '','title_suffix' => ''];
 
 /**
  * @param array $configs
  * @return mixed
  */
 public static function config(array $configs = [])
 {
  self::$configs = $configs;
 }
 
 /**
  * @param string $title
  * @return mixed
  */
 public static function title(string $title)
 {
  self::$data['title'] = $title;
  return new self;
 }
 
 /**
  * @param string $keywords
  * @return mixed
  */
 public static function keywords(string $keywords)
 {
  self::$data['keywords'] = $keywords;
  return new self;
 }
 
 /**
  * @param string|array $name
  * @param mixed $value
  * @return mixed
  */
 public static function setConfig($name,$value = null)
 {
  if(is_array($name))
  {
    self::$configs = array_merge(self::$configs,$name);
  }else{
    self::$configs = array_merge(self::$configs,[$name=>$value]);
  }
  return new self();
 }
 
 /**
  * @param string|array $name
  * @param mixed $value
  * @return mixed
  */
 public static function setData($name,$value = null)
 {
  if(is_array($name))
  {
    self::$data = array_merge(self::$data,$name);
  }else{
    self::$data = array_merge(self::$data,[$name=>$value]);
  }
  return new self();
 }
 
 /**
  * @return mixed
  */
 public static function generate()
 {
  return '<title>'.(isset(self::$data['title']) ? self::$data['title'].self::$configs['title_suffix'] : self::$configs['default_title']).'</title>'.(isset(self::$data['keywords']) ? '<meta name="keywords" content="'.self::defaultControl('keywords').'">' : '').'
  <meta name="description" property="og:description" content="'.self::defaultControl('description').'">
  <meta property="og:title" content="'.(isset(self::$data['title']) ? self::$data['title'].self::$configs['title_suffix'] : self::$configs['default_title']).'"><meta property="og:site_name" content="'.self::$configs['default_title'].'"><meta property="og:url" content="'.self::defaultControl('canonical',URL::canonical()).'"><meta property="og:type" content="'.self::defaultControl('og:type','website').'">
  <link rel="shortcut icon" href="'.self::defaultControl('favicon').'"><meta property="og:image" content="'.self::defaultControl(['og:image','favicon']).'">
  <meta property="twitter:card" content="'.self::defaultControl('twitter:card','summary').'"><meta property="twitter:site" content="@'.(isset(self::$data['twitter:site']) ? self::$data['twitter:site'] : str_replace(['.',':','w'],'',URL::host())).'">
  <meta property="twitter:creator" content="@'.(isset(self::$data['twitter:site']) ? self::$data['twitter:site'] : str_replace(['.',':','w'],'',URL::host())).'"><meta property="twitter:title" content="'.self::defaultControl(['title'],self::$configs['default_title']).'"><meta property="twitter:description" content="'.self::defaultControl(['twitter:description','description']).'">';
 }

 protected static function defaultControl($key,string $default = '',string $value = 'data')
 {
  $arr = $value=='data' ? self::$data : self::$configs;
  if(is_array($key)){
    if(isset($arr[$key[0]])){
      return $arr[$key[0]];
    }else if(isset($arr[$key[0]]) && $arr[$key[0]] != ""){
      return $arr[$key[0]];
    }else{
      return $default;
    }
  }else{
    return isset($arr[$key]) ? $arr[$key] : $default;
  }
 }
}