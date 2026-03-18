<?php
$version = '5.4.2';
$url = "https://github.com/vrana/adminer/releases/download/v{$version}/adminer-{$version}.php";
echo "Downloading Adminer {$version}..." . PHP_EOL;
$contents = file_get_contents($url);
$bytes = file_put_contents('./adminer.php', $contents);
if ($bytes === false) {
    echo 'Failed to write adminer.php to file.' . PHP_EOL;
} else {
    echo 'Adminer successfully updated.' . PHP_EOL;
}
