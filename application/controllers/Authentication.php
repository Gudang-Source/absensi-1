<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
  public function index()
  {
    $this->login();
  }

  public function login()
  {
    if ($this->session->userdata('login')) {
      redirect('Guru/index');
    }
    $this->form_validation->set_rules('nip', 'NIP', 'required|max_length[18]|min_length[18]|trim|numeric');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() === false) {
      $this->load->view('authentication/login');
    } else {
      login($this->input->post());
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('Authentication/login');
  }
}
