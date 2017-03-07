<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 18:56
 */

namespace App\Controllers;


use System\Controller;

class HomeController extends Controller
{


    public function index()
    {
        //$users = $this->loader->model('Users');
        $user = $this->loader->model('Users');
        pre($user->get(1));
    }


    public function prueba()
    {

/*
        $valor = $this->db->data([
            'email' => "andrea valentina",
            'first_name'  => 'hola',
            'status' => 'enabled'
        ])->insert('users')->lastId();


*/

        //$this->db->query('INSERT INTO users SET email = ? ,status=?, first_name= ?','rvasquezpl@gmail.com', 'enabled','vasquez');

        /*$valor =$this->db->query('SELECT * FROM users WHERE id = ?', $valor)->fetch();
        pre($valor);
        echo $valor->first_name;*/
/*
        $this->db->data('email','ricardo_av_4@hotmail.com')
            ->where('id = ?',3)
            ->update('users');
*/
    //    $user = $this->db->select('*')->from('users')->orderBy('id','DESC')->fetch();
    //    $users = $this->db->select('*')->from('users')->orderBy('id','DESC')->fetchAll();
        // $user = $this->db->select('*')->from('users')->where('id > ? AND id < ?',1 ,4)->fetchAll();

        $this->db->where('id > ?',2)->delete('users');


    }
}