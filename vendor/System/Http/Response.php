<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 18:38
 */

namespace System\Http;


use System\Application;

class Response
{
    private $app;
    private $content;
    private $headers =[];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    public function setOutput($content)
    {
        $this->content = $content;
    }

    public function setHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }

    private function sendOutput(){
        echo  $this->content;
    }
    private function sendHeaders(){
        foreach ($this->headers as $header => $value)
        {
            header($header  .":" .$value);
        }
    }
    public function send()
    {
        $this->sendHeaders();
        $this->sendOutput();
    }

}