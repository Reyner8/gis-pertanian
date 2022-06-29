<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kecamatan extends CI_Controller
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
         'title' => 'Kecamatan',
         'name' => $this->session->userdata('username'),
         'dataKecamatan' => $this->admin->getKecamatan()
      );
      $this->load->view('admin/kecamatan', $data);
   }

   public function addKecamatan()
   {
      $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

      if ($this->form_validation->run()) {
         $kecamatan = $this->input->post('kecamatan');
         $this->admin->insertKecamatan(array(
            'nama' => $kecamatan
         ));

         redirect('admin/kecamatan');
      } else {
         $this->index();
      }
   }

   public function updateKecamatan($id)
   {
      $this->admin->updateKecamatan($id, array(
         'nama' =>  $this->input->post('kecamatan')
      ));
      redirect('admin/kecamatan');
   }

   public function deleteKecamatan($id)
   {
      $this->admin->deleteKecamatan($id);
      redirect('admin/kecamatan');
   }
}
