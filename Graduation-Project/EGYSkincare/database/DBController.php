<?php
// connection to database using OOP  method

class DBController
{
    // Database connection details
    protected $host = "localhost"; // specify host name here (normally localhost)
    protected $user = "root";    // user name
    protected $password = "";     // password for the above username
    protected $database = "skincareproject";   // database name

    // connection details
    public $con = null;



    // constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error) {
            echo "Fail" . $this->con->connect_error;
        }
        // echo'Connection Successful!';
    }
    public function __destruct()
    {
        $this->closeConnection();
    }



    // closing MySQL connection
    protected function closeConnection()
    {
        if ($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
    }
}
