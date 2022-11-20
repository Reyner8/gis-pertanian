<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jenis_tanaman extends CI_Controller
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
         'title' => 'Jenis Tanaman',
         'name' => $this->session->userdata('username'),
         'dataJenisTanaman' => $this->admin->getJenisTanaman()
      );
      $this->load->view('admin/jenis_tanaman', $data);
   }

   public function addJenisTanaman()
   {
      $this->form_validation->set_rules('nama', 'Jenis Tanaman', 'required');

      if ($this->form_validation->run()) {
         $jenis_tanaman = $this->input->post('nama');
         $this->admin->insertJenisTanaman(array(
            'nama' => $jenis_tanaman
         ));

         redirect('admin/jenis_tanaman');
      } else {
         $this->index();
      }
   }

   public function updateJenisTanaman($id)
   {
      $this->admin->updateJenisTanaman($id, array(
         'nama' =>  $this->input->post('nama')
      ));
      redirect('admin/jenis_tanaman');
   }

   public function deleteJenisTanaman($id)
   {
      $this->admin->deleteJenisTanaman($id);
      redirect('admin/jenis_tanaman');
   }
}
