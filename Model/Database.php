<?php
class Database{
    private $servername="localhost";
    private $dbname="yiion";
    private $username="root";
    private $password="";

    protected $link;

    function __construct()
    {
        try{
            $this->link = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            // $this->link = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->link;
            

        }
        catch(PDOException $exception){

             print_r($exception);

        }

       
    }


}

?>

