<?php
/**
 * Created by PhpStorm.
 * User: Vasq
 * Date: 8/03/2017
 * Time: 12:05
 */

namespace System;
use PDO;


class DBase
{
    private $app;

    /**
     * PDO Connection
     * @var PDO
     */
    private static $connection;
    private $table;
    private $bindings = [];
    private $wheres = [];
    private $data = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
        if(!$this->isConnected()){
            $this->connect();
        }
    }

    private function isConnected(){
        return static::$connection instanceof PDO;
    }

    private function connect()
    {
        $connectionData = $this->app->file->call("Config.php");
        extract($connectionData);
        static::$connection = new PDO("mysql:host=". $server. ';dbname='.$dbname,$dbuser,$dbpass);
        static::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        static::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        static::$connection->exec("SET NAMES utf8");
    }

    public function insert($data = null){
        if($data){
            $this->table($data);
        }
        $sql = "INSERT INTO ".$this->from() ." SET ".$this->setFields();
        $this->query($sql, $this->bindings);
         static::$connection->lastInsertId();
        return $this;
    }

    public function update($tabla = null)
    {
        if($tabla)
        {
            $this->table($tabla);
        }

        $sql = "UPDATE ". $this->from() ." SET ".$this->setFields();
        if ($this->wheres){
            $sql .=" WHERE ".implode("",$this->wheres);
        }
        $this->query($sql, $this->bindings);
        return $this;

    }

    public function where()
    {
        $bindings = func_get_args();
        $sql = array_shift($bindings);
        $this->bindings($bindings);
        $this->wheres[]= $sql;
         return $this;
    }

    public function data ($key, $value = null){
        if(is_array($key)){
            $this->data = array_merge($this->data,$key);
            $this->bindings($key);
        }else{
            $this->data[$key] = $value;
            $this->bindings($value);
        }

        return $this;
    }

    private function bindings($key)
    {
        if(is_array($key)){
            $this->bindings = array_merge($this->bindings,array_values($key));
        }else{
            $this->bindings[] = $key;
        }
    }

    private function setFields()
    {
        $sql ='';
        foreach (array_keys($this->data) as $key)
        {
            $sql .= '`'.$key .'` = ? , ';
        }
        $sql = rtrim($sql,', ');
        return $sql;
    }

    public function query(){
        $bindings = func_get_args();
        $sql = array_shift($bindings);
        if(count($bindings) == 1 AND is_array($bindings[0])){
            $bindings =$bindings[0];
        }

        try{

            $query = static::$connection->prepare($sql);
            foreach ($this->bindings as $key => $value)
            {
                $query->bindValue($key + 1, $value);
            }
            $query->execute();
            return $query;

        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function from(){
        return $this->table;
    }
    public function table($table)
    {
        $this->table = $table;
    }
}