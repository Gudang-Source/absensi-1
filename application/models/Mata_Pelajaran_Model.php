<?php

class Mata_Pelajaran_Model extends CI_Model
{
  private $table = 'mata_pelajaran';

  public function getMataPelajaran()
  {
    return $this->db->get($this->table)->result_array();
  }

  public function getMataPelajaranById($id_mata_pelajaran)
  {
    return $this->db->get_where($this->table, ['id_pelajaran' => $id_mata_pelajaran])->row_array();
  }

  public function addMataPelajaran($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editMataPelajaran($data)
  {
    return $this->db->update($this->table, $data, ['id_pelajaran' => $data['id_pelajaran']]);
  }
}
