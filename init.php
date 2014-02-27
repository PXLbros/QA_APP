<?php
error_reporting(-1);

ob_start();

define('ABS_PATH', __DIR__ . '/');
define('LIBS_PATH', ABS_PATH . 'libs/');
define('INCLUDES_PATH', ABS_PATH . 'includes/');

// Types
include INCLUDES_PATH . 'types.php';

// E-mail
define('FROM_EMAIL', 'dennis@pxlbros.com');
define('TO_EMAIL', 'dennis@pxlbros.com');

// Settings
define('ADD_TEST_FORM_DATA', true);