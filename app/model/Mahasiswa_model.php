<?php

class Mahasiswa_model
{

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }



    /* private $mhs = [
        [
            "nama" => "Rian",
            "nrp" => "Rian",
            "email" => "rian@gmail",
            "jurusan" => "TI"
        ],

        [
            "nama" => "Gds",
            "nrp" => "12313",
            "email" => "gds@gmail",
            "jurusan" => "TIwer"
        ],

        [
            "nama" => "indra",
            "nrp" => "41234",
            "email" => "insra@gmail",
            "jurusan" => "wer"
        ],

    ]; */



    public function getAllMahasiswa()
    {
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        //return $this->mhs;

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
