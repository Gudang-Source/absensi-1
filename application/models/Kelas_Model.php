<?php

class Kelas_Model extends CI_Model
{
  private $table = 'kelas';

  public function getKelas()
  {
    return $this->db->get($this->table)->result_array();
  }

  public function getKelasById($id_kelas)
  {
    return $this->db->get_where($this->table, ['id_kelas' => $id_kelas])->row_array();
  }

  public function addKelas($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editKelas($data)
  {
    return $this->db->update($this->table, $data, ['id_kelas' => $data['id_kelas']]);
  }
}
