<?php

class Database {
    public $conn;
    

    /**
     * Constructor for database class
     * 
     * @param array $congif
     * 
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try{
            $this->conn = new PDO($dsn,$config["username"], $config["password"],$options);
        }
        catch(PDOException $error){
            throw new Exception("Database connections failed: {$error->getMessage()}");
        }
    }
    /**
    * Query the database
    * 
    * @param string @query
    * 
    * @return PDOStatement
    * @throws PDOException
    *
    */
    public function Query($query){
       try{
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
       }
       catch(PDOException $error){
        throw new Exception("Query failed to execute: {$error->getMessage()}");
       }
    }
}