<?php
require __DIR__ . '/vendor/vrana/adminer/compile.php';
rename($filename, 'adminer.php');
echo "{$filename} renamed to adminer.php.\n";
