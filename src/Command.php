<?php 
namespace OceanWebTurk\SuperWeb;

use OceanWebTurk\Framework\Commands\BaseCommand;

class Command extends BaseCommand
{
 public function publish()
 {
    $path = dirname(__DIR__.'/').'\\';
 	$this->info("Copy [".$path."sw.js] to [public/sw.js]");
    copy($path."sw.js",REAL_BASE_DIR.'public/sw.js');
    echo "\n";
    $this->info("Copy [".$path."manifest.json] to [public/manifest.json]");
    copy($path."manifest.json",REAL_BASE_DIR.'public/manifest.json');
    echo "\n";
 }
}