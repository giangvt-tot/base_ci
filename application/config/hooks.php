<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'] = array(
    'class' => 'prefix_autoloader',
    'function' => 'register',
    'filename' => 'prefix_autoloader.php',
    'filepath' => 'hooks',
    'params' => array(APPPATH . 'base/')
);