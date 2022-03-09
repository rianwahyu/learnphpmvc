<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = "Daftar Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }


    public function detail($id)
    {
        $data['judul'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }


    public function tambah()
    {
        //var_dump($_POST);
        if ($this->model('Mahasiswa_model')->tambahMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        //var_dump($_POST);
        if ($this->model('Mahasiswa_model')->hapusMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapu', 'danger');
            header('Location:' . BASE_URL . '/mahasiswa');
            exit;
        }
    }
}
