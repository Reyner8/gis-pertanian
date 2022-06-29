<?php
defined('BASEPATH') or exit('No direct script access allowed');

class saran extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('user');
      $this->load->library('form_validation');
   }

   public function index()
   {

      $data = array(
         'title' => 'Saran',
         'saran' => $this->user->getSaran()
      );
      $this->load->view('user/saran', $data);
   }

   public function insert()
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('isi', 'Isi', 'required');
      if ($this->form_validation->run()) {
         $data = [
            'nama' => $this->input->post('nama'),
            'isi' => $this->input->post('isi'),
            'tanggal' => date('Y/m/d')
         ];
         $this->user->insert($data);
      }
      redirect('saran');
   }
}
