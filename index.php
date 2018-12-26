<?php

session_start();

include('config/config.php');

include(APP.'/bootstrap.php');
$bootstrap = new Bootstrap();
$bootstrap->run();
