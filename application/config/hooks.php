<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

/* 동일한 후크포인트에서 여러 후크 호출하기 위함 [] 다차원 배열 */

$hook['post_controller'][] = array(
    'class' => 'Db_log',
    'function' => 'logUsers',
    'filename' => 'db_log.php',
    'filepath' => 'hooks'
);
