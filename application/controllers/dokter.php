<?php
defined('BASEPATH') or exit('No direct script access allowed');


class dokter extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('user');
   }

   public function index()
   {
      $data = array(
         'title' => 'Dokter',
         'dataDokter' => $this->user->getDokter(),
      );
      $this->load->view('user/dokter', $data);
   }

   public function detailDokter($id)
   {
      $data = array(
         'title' => 'Detail Dokter',
         'detailDokter' => $this->user->getDokterById($id),
         'jadwal' => $this->user->getJadwalByIdDokter($id),
         'lokasi' => $this->user->getJadwalByIdDokter2($id),
         'alamat' => $this->user->getJadwalByIdDokter3($id),
      );
      $this->load->view('user/detailDokter', $data);
   }
   public function detailLokasi($id)
   {
      $data = array(
         'title' => 'Detail Lokasi',
         'galeri' => $this->user->getGaleri($id)
      );
      $this->load->view('user/detailLokasi', $data);
   }

   public function searchData()
   {
      $searchData = $this->input->post('search');
      $data['title'] = 'Dokter';
      $data['dataDokter'] = $this->user->getDokterByName($searchData);
      $this->load->view('user/dokter', $data);
   }
}
