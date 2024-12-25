<?php

// Moving Drupal CMS installer profile to docroot/profiles/contrib directory.

$sourceDir = __DIR__ . '/../vendor/drupal/cms/web/profiles/drupal_cms_installer';
$destinationDir = __DIR__ . '/../docroot/profiles/contrib/drupal_cms_installer';

if (!is_dir($sourceDir)) {
    echo "Source directory does not exist: $sourceDir\n";
    exit(1);
}

if (!is_dir($destinationDir)) {
    mkdir($destinationDir, 0755, true);
}

$files = scandir($sourceDir);

foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        rename("$sourceDir/$file", "$destinationDir/$file");
    }
}
$removeDir = __DIR__ . '/../vendor/drupal/cms/web';
rmdir($removeDir);

echo "Drupal-CMS Installer profile moved to $destinationDir\n";

?>