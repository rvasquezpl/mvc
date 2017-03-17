<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 16/03/2017
 * Time: 12:56
 */

namespace App\Controllers\Admin\Common;


use System\Controller;

class FooterController extends Controller
{
    public function index()
    {
        return $this->view->render('admin/common/footer');
    }
}