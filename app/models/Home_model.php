<?php

class Home_model
{
    protected $db;
    protected $table = 'pendaftar_perlombaan';
    protected $table_2 = 'jenis_perlombaan';

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllPerlombaan()
    {
        $this->db->query(
            "SELECT a.id as idPendaftar, a.nama_ketua, a.asal_sekolah, a.no_hp, a.lomba_diikuti, a.nama_tim, a.jumlah_anggota, b.id, b.perlombaan
            FROM $this->table a
            JOIN $this->table_2 b ON a.lomba_diikuti = b.id"
        );
        return $this->db->getResultArray();
    }
    public function getJenisPerlombaan()
    {
        $this->db->query("SELECT * FROM $this->table_2");
        return $this->db->getResultArray();
    }
    public function getPerlombaanById($id)
    {
        $this->db->query(
            "SELECT a.id as idPendaftar, a.nama_ketua, a.asal_sekolah, a.no_hp, a.lomba_diikuti, a.nama_tim, a.jumlah_anggota, b.id, b.perlombaan
            FROM $this->table a
            JOIN $this->table_2 b ON a.lomba_diikuti = b.id
            WHERE a.id=:id"
        );

        $this->db->bindParam('id', $id);
        return $this->db->getRowArray();
    }
    public function insertData($data)
    {
        $this->db->query(
            "INSERT INTO $this->table 
            VALUES ('', :nama_ketua, :asal_sekolah, :no_hp, :lomba_diikuti, :nama_tim, :jumlah_anggota)"
        );
        $this->db->bindParam('nama_ketua', $data['nama_ketua']);
        $this->db->bindParam('asal_sekolah', $data['asal_sekolah']);
        $this->db->bindParam('no_hp', $data['no_hp']);
        $this->db->bindParam('lomba_diikuti', $data['lomba_diikuti']);
        $this->db->bindParam('nama_tim', $data['nama_tim']);
        $this->db->bindParam('jumlah_anggota', $data['jumlah_anggota']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateData($data)
    {
        $this->db->query(
            "UPDATE $this->table 
            SET nama_ketua=:nama_ketua, asal_sekolah=:asal_sekolah, no_hp=:no_hp, lomba_diikuti=:lomba_diikuti, nama_tim=:nama_tim, jumlah_anggota=:jumlah_anggota
            WHERE id=:id"
        );
        $this->db->bindParam('id', $data['id']);
        $this->db->bindParam('nama_ketua', $data['nama_ketua']);
        $this->db->bindParam('asal_sekolah', $data['asal_sekolah']);
        $this->db->bindParam('no_hp', $data['no_hp']);
        $this->db->bindParam('lomba_diikuti', $data['lomba_diikuti']);
        $this->db->bindParam('nama_tim', $data['nama_tim']);
        $this->db->bindParam('jumlah_anggota', $data['jumlah_anggota']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function deleteData($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id=:id");
        $this->db->bindParam('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
