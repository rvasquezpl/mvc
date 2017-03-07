<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 6/03/2017
 * Time: 11:33
 */

namespace System;


abstract class Model
{
    protected $app;

    protected $table;
    public function __construct(Application $app)
    {
        $this->app= $app;
    }
    public function __get($key)
    {
        return $this->app->get($key);

    }

    /**
     * Call Database methods dynamically
     *
     * @param string
     * @param array $args
     * @return mixed
     *
     */

    public function __call($method, $args)
    {
        return call_user_func_array([$this->app->db,$method],$args);
    }


    /*
     * Get all Model Records
     * @return array
     */

    public function all()
    {
        return $this->fetchAll($this->table);
    }

    /**
     * Get Record By Id
     *
     * @param int $id
     * @return \stdClass /null
     */
    public function get($id)
    {
        return $this->where('id = ?',$id)->fetch($this->table);
    }
}