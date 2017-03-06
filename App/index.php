<?php
use System\Application;

$app = Application::getInstance();
$app->route->add("/posts/:text/:id","Posts/Post");
pre($app->route->getProperRoute());