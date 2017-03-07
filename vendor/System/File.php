<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 5/03/2017
 * Time: 00:25
 */

namespace System;


class File
{
    const DS = DIRECTORY_SEPARATOR;
    private $root;

    public function __construct($root)
    {
        $this->root = $root;
    }

    public function to($path)
    {
        if(strpos($path,$this->root)===0){
            return $path;
        }
        return $this->root.static::DS.str_replace(['/','\\'],static::DS,$path);
    }

    public function exists($file){
        return file_exists($this->to($file));
    }

    public function call($file)
    {
        return require $this->to($file);
    }

}