<?php

  /*
    * PDO Database Class
    * Connect to databse
    * Create prepared statements
    * Bind values
    * return rows and resaults
  */
  class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; // DB Handler
    private $stmt; // DB Statment
    private $error; // For errors

    public function __construct()
    {
      // Set DSN
      $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;
      $options = [ // options in documentation
        PDO::ATTR_PERSISTENT => true, // increase performance check stablish connection with DB
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // more elegant way to handle errors
      ];

      // Create PDO instance
      try {
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options); // Connect to DB
      } catch (PDOException $e) {
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    // Prepare statment with query
    public function query($sql)
    {
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null)
    {
      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

    // Ecxcute the prepared statement
    public function execute()
    {
      return $this->stmt->execute();
    }

    // Get resault set as array of objects
    public function resaultSet()
    {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single()
    {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount()
    {
      return $this->stmt->rowCount();
    }
  }