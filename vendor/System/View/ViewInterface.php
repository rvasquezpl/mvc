<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 17:33
 */

namespace System\View;


interface ViewInterface
{
    public function getOutput();
    public function __toString();

}