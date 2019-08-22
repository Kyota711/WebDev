<?php
  class Database{
      //menber variables
      private $servername = "localhost";
      private $username = "root";
      private $password = "root";
      private $database = "library";

      public $conn;

      //Constructor ~~will automatically run when you
      //create an object
      public function __construct(){
          $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->database);

          if($this->conn->connect_error){
              die("Connection failed:" .$this->conn->connect_error);
          }
          return $this->conn;
      }

  }

?>