<?php

class Home extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'perlombaan' => $this->model('Home_model')->getAllPerlombaan(),
            'jenisPerlombaan' => $this->model('Home_model')->getJenisPerlombaan()
        ];

        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer', $data);
    }
    public function tambah_data()
    {
        $cekInsert = $this->model('Home_model')->insertData($_POST);
        if ($cekInsert > 0) {
            Flasher::setFlashdata('success', 'Ditambahkan', 'success');
            header('Location:' . base_url);
            exit;
        }
    }
    public function lihat_data()
    {
        $id = $_POST['id'];
        $data = $this->model('Home_model')->getPerlombaanById($id);
        echo json_encode($data);
    }
    public function ubah_data()
    {
        $cekUpdate = $this->model('Home_model')->updateData($_POST);
        if ($cekUpdate > 0) {
            Flasher::setFlashdata('success', 'Diubah', 'success');
            header('Location:' . base_url);
            exit;
        }
    }
    public function hapus_data($id)
    {
        $cekHapus = $this->model('Home_model')->deleteData($id);
        if ($cekHapus > 0) {
            Flasher::setFlashdata('success', 'Dihapus', 'success');
            header('Location:' . base_url);
            exit;
        }
    }
}
