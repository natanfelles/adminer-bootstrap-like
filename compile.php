<?php
rmdir(__DIR__ . '/vendor/vrana/adminer/externals/jush');
symlink(__DIR__ . '/vendor/vrana/jush', __DIR__ . '/vendor/vrana/adminer/externals/jush');
require __DIR__ . '/vendor/vrana/adminer/compile.php';
rename($filename, 'adminer.php');
echo "{$filename} renamed to adminer.php.\n";
