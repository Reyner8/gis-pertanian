<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lokasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('user');
   }

   public function index()
   {

      $data = array(
         'title' => 'Lokasi',
         'dataSpesialis' => $this->user->getSpesialis(),
         'dataKelurahan' => $this->user->getKelurahan(),
         'lokasiDokter' => $this->user->getLokasi()
      );
      $this->load->view('user/lokasi', $data);
   }

   public function lokasiJSON()
   {
      $data = $this->user->getLokasi();
      echo json_encode($data);
   }

   public function search()
   {
      $dokter = $this->input->post('dokter');
      $data = $this->user->getDokter($dokter);
      echo json_encode($data);
   }
}
