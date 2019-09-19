<?php
/* 
| Author    : Muhamad Yusup Hamdani
| Mail      : me@dani.work
| 
| Collage   : STIKOM BINANIAGA
| NPM       : 14177063
|
| Filename  : Koneksi.php
| 
*/
if(!isset($BASE_PATH)) {
    require 'config.php';
}

require $BASE_PATH.'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'sqlite',
    // 'host'      => 'localhost',
    'database'  => $BASE_PATH.'db.sqlite',
    // 'username'  => '',
    // 'password'  => '',
    // 'charset'   => 'utf8',
    // 'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
