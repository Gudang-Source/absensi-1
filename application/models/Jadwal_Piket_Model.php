<?php

class Jadwal_Piket_Model extends CI_Model
{
  private $table = 'jadwal_piket';
  public function getGuruPiket()
  {
    return $this->db->query("SELECT `jadwal_piket`.`id_jadwal_piket`, `pengajar`.`nama`, `jadwal_piket`.`hari` FROM `jadwal_piket` INNER JOIN `pengajar` ON `jadwal_piket`.`nip` = `pengajar`.`nip` ORDER BY `jadwal_piket`.`hari`")->result_array();
  }

  public function getJadwalPiketById($id_jadwal_piket)
  {
    return $this->db->get_where($this->table, ['id_jadwal_piket' => $id_jadwal_piket])->row_array();
  }

  public function editJadwalPiket($data)
  {
    return $this->db->update($this->table, $data, ['id_jadwal_piket' => $data['id_jadwal_piket']]);
  }
}
