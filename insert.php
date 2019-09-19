<?php
require './config.php';
require './src/Siswa.php';

$siswa = new Siswa();

// $siswa->nis   = '123';
// $siswa->nama   = 'Dani';
// $siswa->alamat = 'Jl. Raden Kan\'an Bogor Utara';
// $siswa->save();

// $siswa->nis    = '1234';
// $siswa->nama   = 'Arif';
// $siswa->alamat = 'Alamat';
// $siswa->save();

$get = $siswa->get();

foreach($get as $item) {
    print($item->nama);
}