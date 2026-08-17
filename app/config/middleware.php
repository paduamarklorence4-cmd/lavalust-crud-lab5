<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------
| Adding of middlewares
|--------------------------------------------------------------------
|
| Used for adding middlewares
|
*/

// Load the middleware class file directly
require_once APP_DIR . 'middlewares/StudentMiddleware.php';

$config['middlewares'] = array(
    'StudentMiddleware' => new StudentMiddleware(),
);