<?php

class Pengajar_Model extends CI_Model
{
  private $table = 'pengajar';

  public function getPengajar()
  {
    return $this->db->query("SELECT `pengajar`.`nip`, `pengajar`.`nama`, `agama`.`nama_agama` FROM `pengajar` INNER JOIN `agama` ON `pengajar`.`id_agama` = `agama`.`id_agama`")->result_array();
  }

  public function getPengajarByNIP($nip)
  {
    return $this->db->get_where($this->table, ['nip' => $nip])->row_array();
  }

  public function addPengajar($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editPengajar($data)
  {
    return $this->db->update($this->table, $data, ['nip' => $data['nip']]);
  }
}
