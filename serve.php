<?php
$port = 8089;

print('Server running oh http://localhost:'.$port."\n");
shell_exec('php -S localhost:'.$port.' index.php');