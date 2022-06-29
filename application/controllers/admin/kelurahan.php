<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kelurahan extends CI_Controller
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
         'title' => 'Kelurahan',
         'name' => $this->session->userdata('username'),
         'dataKelurahan' => $this->admin->getKelurahan(),
         'dataKecamatan' => $this->admin->getKecamatan()
      );
      $this->load->view('admin/kelurahan', $data);
   }

   public function addKelurahan()
   {
      $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
      $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'callback_dropdownCheck');

      if ($this->form_validation->run()) {
         $this->admin->insertKelurahan(array(
            'nama' => $this->input->post('kelurahan'),
            'id_kecamatan' => $this->input->post('kecamatan')
         ));

         redirect('admin/kelurahan');
      } else {
         $this->index();
      }
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

   public function updateKelurahan($id)
   {
      $this->admin->updateKelurahan($id, array(
         'nama' =>  $this->input->post('kelurahan'),
         'id_kecamatan' =>  $this->input->post('kecamatan')
      ));
      redirect('admin/kelurahan');
   }

   public function deleteKelurahan($id)
   {
      $this->admin->deleteKelurahan($id);
      redirect('admin/kelurahan');
   }
}
