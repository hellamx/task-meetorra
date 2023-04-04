<?php 

class Db 
{
    public $dbh;
    
    private $dsn = 'mysql:host=localhost;dbname=task_meetorra;charset=utf8';
    private $dbUser = 'root';
    private $dbPassword = '';

    public function __construct()
    {
        $this->dbh = new \PDO($this->dsn, $this->dbUser, $this->dbPassword);
    }
}


?>