<?php

class DBconfig
{

    #atributos
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'poo';
    protected $connection;

    #função 
    public function __construct(){

        if (!isset($this->connection)){

            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

        if (!$this->connection ){
            echo 'Não é possivel conectar ao servidor de banco de dados';
            exit;

           }
        }
    }
}
?>