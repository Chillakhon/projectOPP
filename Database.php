<?php
class Database {
    private static  $instance = null;
    private  $pdo,$stm,$error=false,$result,$count;

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
    public function query ($sql,$params = [])
    {

        $this->error = false;
        $this->stm = $this->pdo->prepare($sql);


        if (count($params))
        {

            foreach ($params as $param)
            {
                $i = 1;
                $this->stm->bindValue($i,$param);
                $i++;
            }

        }
        if (!$this->stm->execute())
        {
            $this->error = true;
        }else
        {
            $this->result = $this->stm->fetchAll(PDO::FETCH_OBJ);
            $this->count = $this->stm->rowCount();
        }
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
    public function count()
    {
        return $this->count;
    }
    public function get($table,$where = [])
    {
        if (count($where)===3)
        {
            $operators = ['=','>','<','<=','>='];
            $filed = $where[0];
            $operator = $where[1];
            $value = $where[2];
            if (in_array($operator,$operators))
            {
                $sql = "SELECT * FROM {$table} WHERE {$filed} {$operator} ?";
                if (!$this->query($sql,[$value])->error())
                {
                    return $this;
                }
            }
        }

        return false;
    }
}
