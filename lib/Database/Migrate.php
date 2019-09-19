<?php
/* 
| Author    : Muhamad Yusup Hamdani
| Mail      : me@dani.work
| 
| Collage   : STIKOM BINANIAGA
| NPM       : 14177063
|
| Filename  : Migrate.php
| 
*/

if(!isset($BASE_PATH)) {
    require 'config.php';
}

require $BASE_PATH.'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

require 'Koneksi.php';


//Create Table siswa
Capsule::schema()->dropIfExists('siswa');
Capsule::schema()->create('siswa', function ($table) {
    $table->increments('id');
    $table->string('nis')       ->unique();
    $table->string('nama');
    $table->string('alamat');
    $table->timestamps();
});