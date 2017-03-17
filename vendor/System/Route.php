<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 5/03/2017
 * Time: 22:09
 */

namespace System;


class Route
{
    private  $app;
    private  $routes = [];
    private  $notFound;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function add($url,$action ,$requestMethod = 'GET')
    {
        $route =[
            'url' => $url,
            'pattern' => $this->generatePattern($url),
            'action' => $this->getAction($action),
            'method' => strtoupper($requestMethod)
        ];

        $this->routes[] = $route;
    }

    public function getProperRoute()
    {
        foreach ($this->routes as $route)
        {

            if($this->isMatching($route['pattern']) AND $this->isMatchingRequestMethod($route['method']))
            {
                $arguments = $this->getArgumentsFrom($route['pattern']);
                list($controller,$method) = explode('@',$route['action']);
                return[$controller,$method,$arguments];
            }
        }
        return $this->app->url->redirectTo($this->notFound);
    }

    /**
     * Determine id the current request method equals
     * the givrn route method
     * @param  string $routeMethod
     * @return bool
     */
    private function isMatchingRequestMethod($routeMethod)
    {
        return $routeMethod == $this->app->request->method();
    }

    private function isMatching($pattern)
    {
        return preg_match($pattern,$this->app->request->url());
    }

    private function getAction($action)
    {
        $action = str_replace("/","\\",$action);
        return (strpos($action,'@')!==false) ?  $action: $action.'@index';
    }

    private function generatePattern($url)
    {
        $pattern = "#^";
        $pattern .= str_replace([':text',':id'],['([a-zA-Z0-9-]+)', '(\d+)'],$url);
        $pattern .= "$#";
        return $pattern;
    }

    private function getArgumentsFrom($pattern)
    {
        preg_match($pattern,$this->app->request->url(),$matches);
        array_shift($matches);
        return $matches;
    }

    public function notFound($url){
        $this->notFound = $url;
    }

}