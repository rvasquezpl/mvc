<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 18:56
 */

namespace App\Controllers\Admin;


use System\Controller;

class DashboardController extends Controller
{

    /**
     * Display Login Form
     *
     * @return  mixed
     */
    public function index()
    {
        pre($this->cookie->get('login'));
    }

    public function submit()
    {


    }
}