<?php

use app\Controllers\Home;
use app\Controllers\Entrar;
   
   
   $app->get('/', Home::class. ':index');
   $app->get('/login', Entrar::class. ':index');
   $app->post('/login', Entrar::class. ':store');
