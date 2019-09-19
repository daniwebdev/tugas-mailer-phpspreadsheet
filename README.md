# [Tugas Kuliah] Send Mail + PHPExcel with PHPSpreadsheet

Source Code ini hanya dokementasi pribadi.
```
Tugas Kuliah : Programming Language 2
Kampus       : STIKOM BINANIAGA BOGOR
```

```
composer install
```

```php
//Migrate.php
//Create Table siswa
Capsule::schema()->dropIfExists('siswa');
Capsule::schema()->create('siswa', function ($table) {
    $table->increments('id');
    $table->string('nis')       ->unique();
    $table->string('nama');
    $table->string('alamat');
    $table->timestamps();
});
```

```
$ php lib/Database/Migrate.php
```



Refference:\
[https://phpspreadsheet.readthedocs.io/en/latest](https://phpspreadsheet.readthedocs.io/en/latest)\
[https://github.com/PHPMailer/PHPMailer](https://github.com/PHPMailer/PHPMailer)\
[https://github.com/illuminate/database](https://github.com/illuminate/database)