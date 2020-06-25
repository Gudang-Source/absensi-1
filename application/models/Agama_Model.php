<?php

class Agama_Model extends CI_Model
{
  private $table = 'agama';

  public function getAgama()
  {
    return $this->db->get($this->table)->result_array();
  }

  public function getAgamaById($id_agama)
  {
    return $this->db->get_where($this->table, ['id_agama' => $id_agama])->row_array();
  }

  public function addAgama($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editAgama($data)
  {
    return $this->db->update($this->table, $data, ['id_agama' => $data['id_agama']]);
  }
}
