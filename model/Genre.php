<?php
class Genre {

    private $connection;
    private $table = "tb_genre";

    public $id;
    public $nama_genre;

    public function __construct($db){
        $this->connection = $db;
    }

    // READ ALL
    public function read(){
        try {
            $query = "SELECT * FROM ".$this->table;
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    // READ ONE
    public function read_one($id){
        try {
            $query = "SELECT * FROM ".$this->table." WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt;
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    // CREATE
    public function create(){
        try {
            $query = "INSERT INTO ".$this->table." (nama_genre) VALUES (?)";
            $stmt = $this->connection->prepare($query);

            $this->nama_genre = htmlspecialchars(strip_tags($this->nama_genre));

            $stmt->bind_param("s", $this->nama_genre);

            return $stmt->execute();
        }
        catch (\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    // UPDATE
    public function update(){
        try {
            $query = "UPDATE ".$this->table." SET nama_genre = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);

            $this->nama_genre = htmlspecialchars(strip_tags($this->nama_genre));

            $stmt->bind_param("si", $this->nama_genre, $this->id);

            return $stmt->execute();
        }
        catch (\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    // DELETE
    public function delete($id){
        try {
            $query = "DELETE FROM ".$this->table." WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
        catch (\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

}
