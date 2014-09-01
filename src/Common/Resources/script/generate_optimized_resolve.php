<?php

$rootDir = __DIR__ . '/../../../../';
$output  = __DIR__ . '/../config/doctrine/optimized_resolve.php';
require($rootDir.'vendor/autoload.php');

$finder = new \Symfony\Component\Finder\Finder();
$finder->in($rootDir.'/src/*/Resources/config/doctrine')
       ->name('resolve.php');

$globalResolves = array();
foreach ($finder as $file) {
    $resolves = require($file->getPathName());
    foreach ($resolves as $interface => $class) {
        $globalResolves[$interface] = $class;
    }
}

$content = sprintf("<?php\n\nreturn %s;\n", var_export($globalResolves, true));
file_put_contents($output, $content);
