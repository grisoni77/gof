<?php
require_once __DIR__. '/../vendor/autoload.php';

// autoloader
$loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
// You can search the include_path as a last resort.
//$loader->useIncludePath(true);
// ... register namespaces and prefixes here - see below
$loader->registerNamespaces(array(
    'GOF' => __DIR__.'/..',
    'Tests' => __DIR__.'/..',
));
// run class loader
$loader->register();
