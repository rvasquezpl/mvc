<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 17:33
 */

namespace System\View;


use System\Application;
use System\File;

class View implements ViewInterface
{
    private $file;
    private $viewPath;
    private $viewData = [];
    private $output = null;

    public function __construct(File $file,$viewPath,array $viewData)
    {
        $this->file = $file;
        $this->generatePath($viewPath);
        $this->viewData = $viewData;
    }

    private function generatePath($viewPath)
    {
        $this->viewPath = $this->file->to("App\\Views\\".$viewPath.'.php');

        if(!$this->viewFileExists()){
            die("Error no se encoentro la vista solicitada");
        }
    }

    private function viewFileExists(){
        return $this->file->exists($this->viewPath);
    }

    public function getOutput()
    {
        if(is_null($this->output)){
            ob_start();
            extract($this->viewData);
            require $this->viewPath;
            $this->output = ob_get_clean();

        }
        return $this->output;
    }

    public function __toString()
    {

        return $this->getOutput();
    }


}