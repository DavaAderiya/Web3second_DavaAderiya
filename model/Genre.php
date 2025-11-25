<?php
class Genre{

    private $connection;
    private $table = "tb_genre";

    // public $id;
    public $nama;

    public function __construct($db){
        $this->connection = $db;
    }

    public function read(){
        try {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function read_one($id){
        try{
            $query = "SELECT * FROM ".$this->table." WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function create(){
        try{
            $query = "INSERT INTO ".$this->table." (nama) VALUES (?)";
            $stmt = $this->connection->prepare($query);

            $this->nama = htmlspecialchars(strip_tags($this->nama));
            
            $stmt->bind_param("s", $this->nama);
            if ($stmt->execute())
                return true;
            return false;
        }
        catch (\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function update(){
        
    }

    public function delete($id)
    {
        try{
            $query = "DELETE FROM ".$this->table." WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            if ($stmt->execute())
                return true;
            else {
                throw new \Exception($stmt->error);
            }
            return false;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }



}