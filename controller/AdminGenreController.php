<?php 

class AdminGenreController {
    private $db;
    private $genre;

    public function __construct() {
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
        // Tampilan form input
        include "page/input_genre.php";
    }

    public function store() {

        // Pastikan input ada
        if (!isset($_POST['nama_genre']) || empty($_POST['nama_genre'])) {
            die("Error: Field 'nama_genre' tidak boleh kosong.");
        }

        // Isi nilai kolom model
        $this->genre->nama_genre = $_POST['nama_genre'];

        // Jalankan query insert
        if ($this->genre->create()) {
            header("Location: index.php?page=genre");
            exit;
        } else {
            die("Gagal menambah data genre.");
        }
    }

    public function edit($id) {
        $stmt = $this->genre->read_one($id);
        $result = $stmt->get_result();
        $edit = $result->fetch_assoc();

        include "page/input_genre.php"; // untuk form edit
    }

    public function update($id) {

        if (!isset($_POST['nama_genre']) || empty($_POST['nama_genre'])) {
            die("Error: Field 'nama_genre' tidak boleh kosong.");
        }

        $this->genre->id = $id;
        $this->genre->nama_genre = $_POST['nama_genre'];

        if ($this->genre->update()) {
            header("Location: index.php?page=genre");
            exit;
        } else {
            die("Gagal update data genre.");
        }
    }

    public function delete($id) {
        if ($this->genre->delete($id)) {
            header("Location: index.php?page=genre");
            exit;
        } else {
            die("Gagal menghapus data genre.");
        }
    }
}
