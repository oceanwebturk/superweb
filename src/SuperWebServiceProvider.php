<?php 
namespace OceanWebTurk\SuperWeb;

use OceanWebTurk\Framework\Support\ServiceProvider;

class SuperWebServiceProvider extends ServiceProvider
{
 public function boot()
 {
  $this->app->cli->command("superweb:publish",[Command::class,'publish']);
 }
}