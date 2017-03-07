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


        $valor = $this->db->data([
            'email' => "andrea valentina",
            'first_name'  => 'hola',
            'status' => 'enabled'
        ])->insert('users')->lastId();



        //$this->db->query('INSERT INTO users SET email = ? ,status=?, first_name= ?','rvasquezpl@gmail.com', 'enabled','vasquez');

        /*$valor =$this->db->query('SELECT * FROM users WHERE id = ?', $valor)->fetch();
        pre($valor);
        echo $valor->first_name;*/

        $this->db->data('first_name','VASQUEZ CHAVEZ')
           // ->where('id = ?',34)
            ->update('users');

    }
}