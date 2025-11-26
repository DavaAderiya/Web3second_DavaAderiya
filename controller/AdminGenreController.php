<?php 

class AdminGenreController {
    private $db;
    private $genre;

    public function __construct(){
        $dbase = new Database();
        $this->db = $dbase->getConnection();
        $this->genre = new Genre($this->db);
    }

    public function index() {
        $stmt = $this->genre->read();
        $result = $stmt->get_result();
        $genres = $result->fetch_all(MYSQLI_ASSOC);

        include "page/view_genre.php";
    }

    public function create() {
        include "page/input_genre.php";
    }

    public function store() {
        // echo "test";
        

            $this->genre->nama = $_POST['nama'];
            $this->genre->create();

            // header("Location: index.php?page=genre");
            exit;
        // }
    }

    public function delete($id){
        $this->genre->delete($id);
    }

    public function edit($id) {
        $stmt = $this->genre->read_one($id);
        $result = $stmt->get_result();
        $edit = $result->fetch_assoc();
        // No need to include the form here, it's handled in index()
    }
}