<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 15/03/2017
 * Time: 19:52
 */

namespace App\Controllers;


use System\Application;
use System\Controller;

class NotFoundController extends Controller
{


    public function index()
    {
        return $this->view->render('not-found');
    }


}