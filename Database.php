<?php
class Database {
    private static  $instance = null;
    private  $pdo,$stm,$error=false,$result;

    private function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=testOPP",'root','root');
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query ($sql)
    {
        $this->error = false;
        $this->stm = $this->pdo->prepare($sql);
        if (!$this->stm->execute())
        {
            $this->error = true;
        }

        $this->result = $this->stm->fetchAll(PDO::FETCH_OBJ);
        return $this;
    }
    public function error()
    {
        return $this->error;
    }
    public function result ()
    {
        return $this->result;
    }
}
