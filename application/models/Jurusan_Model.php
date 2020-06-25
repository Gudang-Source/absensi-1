<?php

class Jurusan_Model extends CI_Model
{
  private $table = 'jurusan';

  public function getJurusan()
  {
    return $this->db->get($this->table)->result_array();
  }

  public function getJurusanById($id_jurusan)
  {
    return $this->db->get_where($this->table, ['id_jurusan' => $id_jurusan])->row_array();
  }

  public function addJurusan($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editJurusan($data)
  {
    return $this->db->update($this->table, $data, ['id_jurusan' => $data['id_jurusan']]);
  }
}
