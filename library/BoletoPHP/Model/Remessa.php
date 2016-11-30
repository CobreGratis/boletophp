<?php
namespace BoletoPHP\Model;

class Remessa 
{
    private $db;

    public function __construct()
    {
        $this->db = new \SQLite3(__DIR__."/_temp/remessa");
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS retorno (
                id int auto_increment PRIMARY KEY,
                line text
            )
        ");  
    }

    public function save($line)
    {

    }
}