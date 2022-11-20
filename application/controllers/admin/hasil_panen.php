<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_panen extends CI_Controller
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

   public function data($id)
   {
      $data = array(
         'title' => 'Data Kelompok Tani',
         'name' => $this->session->userdata('username'),
         'kelurahan' => $this->admin->getKelurahanById($id),
         'hasilPanen' => $this->admin->hasilPanenByKelurahan($id),
         // 'sumJenisTanaman' => $this->admin->getHasilSum($id),
         'jenisTanaman' => $this->admin->getJenisTanaman(),
         'isEditHasil' => false,
      );
      $this->load->view('admin/hasil', $data);
   }

   public function editHasil($id)
   {
      $hasil = $this->admin->getHasilByIdRow($id);
      $data = array(
         'title' => 'Edit Hasil',
         'name' => $this->session->userdata('username'),
         'kelurahan' => $hasil->id_kelurahan,
         'hasilPanen' => $this->admin->hasilPanenByKelurahan($hasil->id_kelurahan),
         'jenisTanaman' => $this->admin->getJenisTanaman(),
         'editHasil' => $this->admin->getHasilByIdRow($id),
         'isEditHasil' => true,
      );


      $this->load->view('admin/hasil', $data);
   }

   public function addHasil($idKelurahan)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jenis_tanaman', 'Jenis Tanaman', 'callback_dropdownCheck');
      $this->form_validation->set_rules('hasil', 'Hasil', 'required');
      $this->form_validation->set_rules('tahun', 'Tahun', 'required');

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $jenis_tanaman = $this->input->post('jenis_tanaman');
         $hasil = $this->input->post('hasil');
         $tahun = $this->input->post('tahun');
         $data = array(
            'id_kelurahan' => $idKelurahan,
            'nama' => $nama,
            'id_jenis' => $jenis_tanaman,
            'hasil' => $hasil,
            'tahun' => $tahun,
         );
         $this->admin->insertHasil($data);
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/hasil_panen/data/' . $idKelurahan);
      } else {
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/hasil_panen/data/' . $idKelurahan);
      }
   }

   public function updateHasil($id)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jenis_tanaman', 'Jenis Tanaman', 'callback_dropdownCheck');
      $this->form_validation->set_rules('hasil', 'Hasil', 'required');
      $this->form_validation->set_rules('tahun', 'Tahun', 'required');
      $idKelurahan = $this->admin->getHasilByIdRow($id)->id_kelurahan;

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $jenis_tanaman = $this->input->post('jenis_tanaman');
         $hasil = $this->input->post('hasil');
         $tahun = $this->input->post('tahun');
         $data = array(
            'id_kelurahan' => $idKelurahan,
            'nama' => $nama,
            'id_jenis' => $jenis_tanaman,
            'hasil' => $hasil,
            'tahun' => $tahun,
         );
         $this->admin->updateHasil($id, $data);
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/hasil_panen/data/' . $idKelurahan);
      } else {
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/hasil_panen/data/' . $idKelurahan);
      }
   }

   public function deleteHasil($id)
   {
      $idKelurahan = $this->admin->getHasilByIdRow($id)->id_kelurahan;
      $this->admin->deleteHasil($id);
      redirect('admin/hasil_panen/data/' . $idKelurahan);
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

   public function gambarCheck($str)
   {
      $img = $_FILES['image']['name'];
      if ($img[0] == '') {
         $this->form_validation->set_message('gambarCheck', 'Please Select Your {field}');
         return FALSE;
      } else {
         return TRUE;
      }
   }


   private function __uploadImage($key, $value)
   {
      // image
      $name = $value;
      $allowedFileType = array('png', 'jpg');
      $explode = explode('.', $name);
      $randomName = rand();
      $newName = $randomName . '.' . $explode[1];
      $tmp_file = $_FILES['image']['tmp_name'][$key];
      // -----
      if (in_array($explode[1], $allowedFileType) === true) {
         move_uploaded_file($tmp_file, './assets/images/galeri/' . $newName);
         return $newName;
      }
   }
}
