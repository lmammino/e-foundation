<?php

$sourcePath = __DIR__.'/../src';
$options = array(
    'title'                => 'EFoundation API',
    'build_dir'            => __DIR__.'/build',
    'cache_dir'            => __DIR__.'/cache',
    'default_opened_level' => 2,
);

return new Sami\Sami($sourcePath, $options);
