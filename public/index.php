<?php

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;


$app = AppFactory::create();



require '../app/Helpers/config.php';

require  '../app/Routes/site.php';

$app->run();