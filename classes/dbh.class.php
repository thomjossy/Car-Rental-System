<?php
class dbh{
    private $host = '127.0.0.1';
    private $db   = 'software_engineering_assignment';
    private $user = 'root';
    private $pass = '';
    private $port = "3306";
    private $charset = 'utf8mb4';

    private $options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

protected function connection(){
    $dsn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset.";port=$this->port";
    try {
        $pdo = new \PDO($dsn, $this->user, $this->pass, $this->options);
        echo 'connected successful';
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
        die();
    }
}

}