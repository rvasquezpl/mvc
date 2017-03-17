<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 5/03/2017
 * Time: 20:14
 */

namespace System\Http;


use System\Application;

class Request
{
    private $app;
    private $url;
    private $baseUrl;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function prepareUrl()
    {
        $script = dirname($this->server("SCRIPT_NAME"));
        $request = $this->server('REQUEST_URI');
        if(strlen($script)===1){
            $script= 0;
        }

        if(strpos($request,'?')!==false){
                list($request,$query) = explode('?',$request);
        }
        $this->url = rtrim(preg_replace("#^".$script."#",'',$request),'/');

        $this->baseUrl = $this->server('REQUEST_SCHEME').'://'.$this->server("SERVER_NAME").$script."/";
    }

    public function server($key,$default = "")
    {
        return array_get($_SERVER,$key,$default);
    }

    public function method(){
        return $this->server("REQUEST_METHOD");
    }

    public function get($key ,$default = "")
    {
        return array_get($_GET,$key,$default);
    }
    public function post($key,$default = "")
    {
        return array_get($_POST,$key,$default);
    }

    public function url(){
        return $this->url;
    }

    public function baseUrl()
    {
        return $this->baseUrl;
    }

}