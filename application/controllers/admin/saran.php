<?php
defined('BASEPATH') or exit('No direct script access allowed');

class saran extends CI_Controller
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
         'title' => 'Saran',
         'name' => $this->session->userdata('username'),
         'dataSaran' => $this->admin->getSaran()
      );
      $this->load->view('admin/saran', $data);
   }

   public function deleteSaran($id)
   {
      $this->admin->deleteSaran($id);
      redirect('admin/saran');
   }
}
