<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 18:56
 */

namespace App\Controllers\Admin;


use System\Controller;

class CategoriesController extends Controller
{

    /**
     * Display Categories Lis
     *
     * @return  mixed
     */
    public function index()
    {
        $this->html->setTitle('Categories');
        $view= $this->view->render('admin/categories/list');
        return $this->adminLayout->render($view);
    }

    /**
     * Open Categories Form
     * @return string
     */
    public function add()
    {
        $data['action'] = $this->url->link('/admin/categories/submit');
        return $this->view->render('admin/categories/form',$data);
    }

    /**
     * submit for creating new category
     * @return  string / json
     */
    public function submit(){
        $json['success'] = 'Done';
        return $this->json($json);
    }
}