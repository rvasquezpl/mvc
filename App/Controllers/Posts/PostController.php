<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 11:15
 */

namespace App\Controllers\Posts;
use System\Controller;

class PostController extends Controller
{

    public function index()
    {
        echo $view =(String)$this->view->render("Posts/index");
    }

}