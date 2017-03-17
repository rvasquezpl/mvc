<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 18:56
 */

namespace App\Controllers\Admin;


use System\Controller;

class LoginController extends Controller
{

    /**
     * Display Login Form
     *
     * @return  mixed
     */
    public function index()
    {
        /*$this->db->data([
            'email' => 'rvasquezpl@gmail.com',
            'password'=> password_hash(123456,PASSWORD_DEFAULT),
            'created'=> time(),
            'status' => 'enabled',
            'first_name' =>"Ricardo Alberto",
            'last_name' =>"Vasquez Plasencia"
        ])->insert('users');*/

        $loginModel = $this->loader->model('Login');
        if($loginModel->isLogged()){
            return $this->url->redirectTo('/admin');
        }
        $data['errors'] =$this->errors;
        return $this->view->render("admin/users/login",$data);
    }

    public function submit()
    {

        if($this->isValid()){

                $loginModel = $this->loader->model('Login');

                $loggedInUser = $loginModel->user();

                if($this->request->post('remember')){
                    //save Login data in cookie
                    $this->cookie->set('login',$loggedInUser->code);

                }else{
                    //save Login data in session
                    $this->session->set('login',$loggedInUser->code);

                }

                //return $this->url->redirectTo('/admin');
                $json =[];
                $json['cookie'] =$this->cookie->get('login');
                $json['success'] = 'Welcome Back '. $loggedInUser->first_name;

                $json['redirect'] = $this->url->link('/admin');

                return $this->json($json);

        }else{
            //return $this->index();
            $json =[];
            $json['errors'] = $this->errors;
            return $this->json($json);
        }
    }

    /**
     * Validate Login Form
     * @return bool
     */
    private function isValid()
    {
        $email = $this->request->post('email');
        $password = $this->request->post('password');

        if(!$email){
            $this->errors[] = 'Please Insert Email address';
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->errors[] ='Please Insert Valid Email';
        }

        if(!$password){
            $this->errors[] = 'Please Insert Password';
        }
        if(!$this->errors)
        {
            $loginModel = $this->loader->model('Login');
            if(! $loginModel->isValidLogin($email,$password)){
                $this->errors[] = 'Invalid Login Data';
            }
        }

        return empty($this->errors);

    }
}