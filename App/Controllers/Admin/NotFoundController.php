<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 15/03/2017
 * Time: 19:52
 */

namespace App\Controllers\Admin;


use System\Application;
use System\Controller;

class NotFoundController extends Controller
{
    private $app;

    /**
     * NotFoundController constructor.
     * @param Application $app
     */

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index()
    {
        return $this->view->render();
    }


}