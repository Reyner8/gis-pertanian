<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lokasi extends CI_Controller
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
         'title' => 'Lokasi',
         'name' => $this->session->userdata('username'),
         'dataLokasi' => $this->admin->getLokasi(),
         'dataKelurahan' => $this->admin->getKelurahan()
      );
      $this->load->view('admin/lokasi', $data);
   }

   public function addLokasi()
   {

      $this->form_validation->set_rules('lat', 'Latitude', 'required');
      $this->form_validation->set_rules('lng', 'Longitude', 'required');
      $this->form_validation->set_rules('namaLokasi', 'Lokasi', 'callback_dropdownCheck');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('apotik', 'Apotik', 'callback_dropdownCheck');
      $this->form_validation->set_rules('wifi', 'Wifi', 'callback_dropdownCheck');
      $this->form_validation->set_rules('ac', 'AC', 'callback_dropdownCheck');
      $this->form_validation->set_rules('ruang_asi', 'Ruang Asi', 'callback_dropdownCheck');
      $this->form_validation->set_rules('ruang_tunggu', 'Ruang Tunggu', 'callback_dropdownCheck');
      $this->form_validation->set_rules('nebulizer', 'Nebulizer', 'callback_dropdownCheck');
      $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'callback_dropdownCheck');

      if ($this->form_validation->run()) {
         $lat = $this->input->post('lat');
         $lng = $this->input->post('lng');
         $namaTempat = ucwords($this->input->post('namaLokasi'));
         $alamat = $this->input->post('alamat');
         $apotik = $this->input->post('apotik');
         $wifi = $this->input->post('wifi');
         $ac = $this->input->post('ac');
         $ruang_asi = $this->input->post('ruang_asi');
         $ruang_tunggu = $this->input->post('ruang_tunggu');
         $nebulizer = $this->input->post('nebulizer');
         $kelurahan = $this->input->post('kelurahan');
         $data = array(
            'latitude' => $lat,
            'longitude' => $lng,
            'nama_tempat' => $namaTempat,
            'alamat' => $alamat,
            'apotik' => $apotik,
            'wifi' => $wifi,
            'ac' => $ac,
            'ruang_asi' => $ruang_asi,
            'ruang_tunggu' => $ruang_tunggu,
            'nebulizer' => $nebulizer,
            'id_kelurahan' => $kelurahan
         );

         $this->admin->insertLokasi($data);
         redirect('admin/lokasi');
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

   public function updateLokasi($id)
   {
      $data = array(
         'latitude' =>  $this->input->post('lat'),
         'longitude' =>  $this->input->post('lng'),
         'nama_tempat' =>  ucwords($this->input->post('namaLokasi')),
         'alamat' =>  ucwords($this->input->post('alamat')),
         'apotik' => $this->input->post('apotik'),
         'wifi' => $this->input->post('wifi'),
         'ac' => $this->input->post('ac'),
         'ruang_asi' => $this->input->post('ruang_asi'),
         'ruang_tunggu' => $this->input->post('ruang_tunggu'),
         'nebulizer' => $this->input->post('nebulizer'),
         'id_kelurahan' => $this->input->post('kelurahan')
      );
      $this->admin->updateLokasi($id, $data);
      redirect('admin/lokasi');
   }

   public function deleteLokasi($id)
   {
      $this->admin->deleteLokasi($id);
      redirect('admin/lokasi');
   }
}
