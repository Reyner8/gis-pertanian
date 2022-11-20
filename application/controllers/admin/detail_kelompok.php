<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail_kelompok extends CI_Controller
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

   public function data($idKelompokTani)
   {
      $data = array(
         'title' => 'Data Kelompok Tani',
         'name' => $this->session->userdata('username'),
         'kelompokTani' => $this->admin->getKelompokTaniById($idKelompokTani),
         'jenisTanaman' => $this->admin->getJenisTanaman(),
         'dataHasil' => $this->admin->getHasilByIdKelompok($idKelompokTani),
         'isEditAnggota' => false,
         'isEditHasil' => false,
      );
      $this->load->view('admin/detail_kelompok', $data);
   }

   public function editHasil($id)
   {
      $hasil = $this->admin->getHasilById($id);
      $data = array(
         'title' => 'Detail Kelompok',
         'name' => $this->session->userdata('username'),
         'kelompokTani' => $this->admin->getKelompokTaniById($hasil[0]->id_kelompok),
         'dataHasil' => $this->admin->getHasilByIdKelompok($hasil[0]->id_kelompok),
         'jenisTanaman' => $this->admin->getJenisTanaman(),
         'editHasil' => $this->admin->getHasilByIdRow($id),
         'isEditAnggota' => false,
         'isEditHasil' => true,
      );

      $this->load->view('admin/detail_kelompok', $data);
   }

   public function addHasil($idKelompokTani)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jenis_tanaman', 'Jenis Tanaman', 'callback_dropdownCheck');
      $this->form_validation->set_rules('hasil', 'Hasil', 'required');

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $jenis_tanaman = $this->input->post('jenis_tanaman');
         $hasil = $this->input->post('hasil');
         $tahun = $this->input->post('tahun');
         $data = array(
            'id_kelompok' => $idKelompokTani,
            'nama' => $nama,
            'id_jenis' => $jenis_tanaman,
            'hasil' => $hasil,
            'tahun' => $tahun,
         );
         $this->admin->insertHasil($data);
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/detail_kelompok/data/' . $idKelompokTani);
      } else {
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/detail_kelompok/data/' . $idKelompokTani);
      }
   }

   public function updateHasil($id)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jenis_tanaman', 'Jenis Tanaman', 'callback_dropdownCheck');
      $this->form_validation->set_rules('hasil', 'Hasil', 'required');
      $idKelompokTani = $this->admin->getHasilByIdRow($id)->id_kelompok;

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $jenis_tanaman = $this->input->post('jenis_tanaman');
         $hasil = $this->input->post('hasil');
         $tahun = $this->input->post('tahun');
         $data = array(
            'id_kelompok' => $idKelompokTani,
            'nama' => $nama,
            'id_jenis' => $jenis_tanaman,
            'hasil' => $hasil,
            'tahun' => $tahun,
         );
         $this->admin->updateHasil($id, $data);
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/detail_kelompok/data/' . $idKelompokTani);
      } else {
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/detail_kelompok/data/' . $idKelompokTani);
      }
   }

   public function deleteHasil($id)
   {
      $idKelompokTani = $this->admin->getHasilByIdRow($id)->id_kelompok;
      $this->admin->deleteHasil($id);
      redirect('admin/detail_kelompok/data/' . $idKelompokTani);
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
