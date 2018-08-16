<?php
use org\bovigo\vfs\vfsStream;
use Spryker\Shared\Config\Environment;

require_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION', 'ZED');
define('APPLICATION_ENV', Environment::TESTING);
define('APPLICATION_STORE', 'UNIT');

$x = vfsStream::setup('root');

define('APPLICATION_ROOT_DIR', $x->url());
