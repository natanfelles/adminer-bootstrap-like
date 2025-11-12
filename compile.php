<?php
rmdir(__DIR__ . '/vendor/vrana/adminer/externals/jush');
symlink(__DIR__ . '/vendor/vrana/jush', __DIR__ . '/vendor/vrana/adminer/externals/jush');

//"vrana/jsshrink": "dev-main#4f8a69bd80bda24e8233bca428e5f56400e3cb1b",
//rmdir(__DIR__ . '/vendor/vrana/adminer/externals/JsShrink');
//symlink(__DIR__ . '/vendor/vrana/jsshrink', __DIR__ . '/vendor/vrana/adminer/externals/JsShrink');

rmdir(__DIR__ . '/vendor/vrana/adminer/externals/PhpShrink');
symlink(__DIR__ . '/vendor/vrana/phpshrink', __DIR__ . '/vendor/vrana/adminer/externals/PhpShrink');

require __DIR__ . '/vendor/vrana/adminer/compile.php';
rename($filename, 'adminer.php');
echo "{$filename} renamed to adminer.php.\n";
