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
         'dataKelurahan' => $this->user->getKelurahan(),
         'lokasiKelompokTani' => $this->user->getLokasi()
      );
      $this->load->view('user/lokasi', $data);
   }

   public function lokasiJSON()
   {
      $data = $this->user->getLokasi();
      echo json_encode($data);
   }

   public function detailKelompokTani($id)
   {
      $data = array(
         'title' => 'Detail',
         'kelompokTani' => $this->user->getKelompokTaniById($id),
         'galeri' => $this->user->getGaleriByIdKelompok($id),
         'hasil' => $this->user->getHasilByIdKelompok($id),
      );
      $this->load->view('user/detailKelompokTani', $data);
   }
}
