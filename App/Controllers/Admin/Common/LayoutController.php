<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 16/03/2017
 * Time: 12:56
 */

namespace App\Controllers\Admin\Common;


use System\Controller;
use System\View\ViewInterface;

class LayoutController extends Controller
{
    /**
     * Render the Layout with the given view Object
     *@param  \System\View\ViewInterface $view
     */
    public function render(ViewInterface $view){
        $data['content'] = $view;
        $data['header'] = $this->loader->controller('Admin/Common/Header')->index();
        $data['sidebar'] = $this->loader->controller('Admin/Common/Sidebar')->index();
        $data['footer'] = $this->loader->controller('Admin/Common/Footer')->index();
        return $this->view->render('admin/common/layout',$data);
    }
    public function index()
    {

    }
}