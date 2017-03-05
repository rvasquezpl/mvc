<?php

use System\Application;
use System\File;

require "vendor/System/File.php";
require "vendor/System/Application.php";

$file = new File(dirname(__FILE__));
$app = Application::getInstance($file);
$app->request->prepareUrl();
