<?php

use Illuminate\Support\Facades\Route;

// routers personalizados
require base_path('routes/auth.php');
//importamos las rutas propias aca
require base_path(path: 'routes/admin.php');
require base_path(path: 'routes/user.php');
require base_path(path: 'routes/services.php');
require base_path(path: 'routes/news.php');
