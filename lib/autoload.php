<?php

//Class autoload
function __autoload($class)
{
    $file = 'lib/'.$class . "_lib.php";
    if (is_readable($file)) {
        require $file;
    }
}
