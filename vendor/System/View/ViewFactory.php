<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 17:24
 */

namespace System\View;


use System\Application;

class ViewFactory
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function render($viewPath, array $viewData=[])
    {
        return new View($this->app->file,$viewPath,$viewData);
    }

}