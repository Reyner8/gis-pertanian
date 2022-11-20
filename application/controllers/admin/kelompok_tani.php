<?php
defined('BASEPATH') or exit('No direct script access allowed');


class kelompok_tani extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('admin');
      $this->load->library('form_validation');
      if (!$this->session->userdata('logData')) {
         redirect('admin/log');
      }
   }

   public function index()
   {
      $data = array(
         'title' => 'Kelompok Tani',
         'name' => $this->session->userdata('username'),
         'dataKelurahan' => $this->admin->getKelurahan(),
         'isEdit' => false
      );
      $this->load->view('admin/kelompok_tani', $data);
   }

   public function dropdownCheck($str)
   {
      if ($str == '') {
         $this->form_validation->set_message('dropdownCheck', 'Please Select Your {field}');

         return FALSE;
      } else {
         return TRUE;
      }
   }
}
