<?php
namespace App\Database\configration;

// namespace App\Database\cofigration;



class Connection
{

    private  $hostName = "localhost";
    private  $database = "ecommerce";
    private $userName = "root";
    private  $password = "";
    public $conn;

    public function __construct()
    {
        $this->conn = new \mysqli($this->hostName, $this->userName, $this->password,$this->database );


        // if ($this->conn->connect_error) {
        //     die("Connection failed: " . $this->conn->connect_error);
        // }
        // echo "Connected successfully";
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}