<?php
require 'config.php';

class database
{
    public $conn;

    public function __construct(){
        $this->open_connect();
    }
    public function open_connect(){
        $this->conn = new mysqli(
            HOSTNAME,
            USERNAME,
            PASSWORD,
            DB_NAME,
            DB_PORT
        );

        if($this->conn->connect_error){
            die("Connection failed: ".$this->conn->connect_error);
        }
    }
}
