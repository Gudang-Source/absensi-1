<?php

class Dashboard_Model extends CI_Model
{
    public function hitungSiswa()
    {
        return $this->db->count_all_results('siswa');
    }
    public function hitungPengajar()
    {
        return $this->db->count_all_results('pengajar');
    }
    public function hitungKelas()
    {
        return $this->db->count_all_results('kelas');
    }
    public function hitungJurusan()
    {
        return $this->db->count_all_results('jurusan');
    }
}
