<?php 

use OceanWebTurk\SuperWeb\SuperWeb;

if(!function_exists("superweb")){
  /**
   * @return mixed
   */
  function superweb()
  {
   return new SuperWeb();
  }
}