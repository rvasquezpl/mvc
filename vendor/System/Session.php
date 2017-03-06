<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 5/03/2017
 * Time: 18:41
 */

namespace System;


class Session
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function start()
    {
        if(!session_id()){
            session_start();
        }
    }

    public function get($key,$default = "")
    {
        return array_get($_SESSION,$key,$default);
    }

    public function pull($key)
    {
        $value = $this->get($key);
        unset($_SESSION[$key]);
        return $value;
    }

    public function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }
    public function all(){
        return $_SESSION;
    }

    public function destroy(){
         session_destroy();
         unset($_SESSION);
    }
}