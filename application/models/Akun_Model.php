<?php

  class Akun_Model extends CI_Model {
    public function getAkunByNIP($nip)
    {
      return $this->db->get_where('akun', ['nip' => $nip])->row_array();
    }
  }