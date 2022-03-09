<?php

class Mahasiswa_model
{

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

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=phpmvc;';

        try{
            $this->dbh = new PDO($dsn, 'root', '');            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa(){
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        //return $this->mhs;
    }
}
