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

   public function galeri($idKelompokTani)
   {
      $data = array(
         'title' => 'Galeri',
         'name' => $this->session->userdata('username'),
         'kelompokTani' => $this->admin->getKelompokTaniById($idKelompokTani),
         'dataGaleri' => $this->admin->getGaleriById($idKelompokTani),
         'dataAnggota' => $this->admin->getAnggotaByIdKelompok($idKelompokTani),
         'dataHasil' => $this->admin->getHasilByIdKelompok($idKelompokTani),
         'isEditAnggota' => false,
         'isEditHasil' => false,
      );

      $this->load->view('admin/detail_kelompok', $data);
   }

   public function addGaleri($idKelompokTani)
   {

      $this->form_validation->set_rules('image', 'Gambar', 'callback_gambarCheck');

      if ($this->form_validation->run()) {

         $image = $_FILES['image']['name'];

         foreach ($image as $key => $value) {
            $newImage = $this->__uploadImage($key, $value);
            $this->admin->insertGaleri([
               'nama' => $newImage,
               'id_kelompok' => $idKelompokTani
            ]);
         }
         $this->session->set_flashdata('error', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      } else {
         $this->session->set_flashdata('error', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      }
   }

   public function deleteGaleri($id)
   {
      $idKelompokTani = $this->admin->getKelompokTaniByGaleri($id)->id_kelompok;
      $this->admin->deleteGaleri($id);
      redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
   }

   public function addAnggota($idKelompokTani)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
      $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'callback_dropdownCheck');

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $tempat_lahir = $this->input->post('tempat_lahir');
         $tanggal_lahir = $this->input->post('tanggal_lahir');
         $jabatan = $this->input->post('jabatan');
         $data = array(
            'id_kelompok' => $idKelompokTani,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jabatan' => $jabatan,
         );
         $this->admin->insertAnggota($data);
         $this->session->set_flashdata('err-anggota', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      } else {
         $this->session->set_flashdata('err-anggota', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      }
   }

   public function editAnggota($id)
   {
      $anggota = $this->admin->getAnggotaById($id);

      $data = array(
         'title' => 'Detail Kelompok',
         'name' => $this->session->userdata('username'),
         'kelompokTani' => $this->admin->getKelompokTaniById($anggota[0]->id_kelompok),
         'dataGaleri' => $this->admin->getGaleriById($anggota[0]->id_kelompok),
         'dataAnggota' => $this->admin->getAnggotaByIdKelompok($anggota[0]->id_kelompok),
         'dataHasil' => $this->admin->getHasilByIdKelompok($anggota[0]->id_kelompok),
         'editAnggota' => $this->admin->getAnggotaByIdRow($id),
         'isEditHasil' => false,
         'isEditAnggota' => true,
      );
      $this->load->view('admin/detail_kelompok', $data);
   }

   public function updateAnggota($idAnggota)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
      $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'callback_dropdownCheck');
      $idKelompokTani = $this->admin->getAnggotaByIdRow($idAnggota)->id_kelompok;

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $tempat_lahir = $this->input->post('tempat_lahir');
         $tanggal_lahir = $this->input->post('tanggal_lahir');
         $jabatan = $this->input->post('jabatan');
         $data = array(
            'id_kelompok' => $idKelompokTani,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jabatan' => $jabatan,
         );
         $this->admin->updateAnggota($idAnggota, $data);
         $this->session->set_flashdata('err-anggota', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      } else {
         $this->session->set_flashdata('err-anggota', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      }
   }

   public function deleteAnggota($id)
   {
      $idKelompokTani = $this->admin->getAnggotaByIdRow($id)->id_kelompok;
      $this->admin->deleteAnggota($id);
      redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
   }

   public function editHasil($id)
   {
      $hasil = $this->admin->getHasilById($id);
      $data = array(
         'title' => 'Detail Kelompok',
         'name' => $this->session->userdata('username'),
         'kelompokTani' => $this->admin->getKelompokTaniById($hasil[0]->id_kelompok),
         'dataGaleri' => $this->admin->getGaleriById($hasil[0]->id_kelompok),
         'dataAnggota' => $this->admin->getAnggotaByIdKelompok($hasil[0]->id_kelompok),
         'dataHasil' => $this->admin->getHasilByIdKelompok($hasil[0]->id_kelompok),
         'editHasil' => $this->admin->getHasilByIdRow($id),
         'isEditAnggota' => false,
         'isEditHasil' => true,
      );

      $this->load->view('admin/detail_kelompok', $data);
   }

   public function addHasil($idKelompokTani)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('tanam', 'Di Tanam', 'required');
      $this->form_validation->set_rules('panen', 'Panen', 'required');
      $this->form_validation->set_rules('modal_awal', 'Modal Awal', 'required');
      $this->form_validation->set_rules('hasil_jual', 'Hasil Jual', 'required');

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $ditanam = $this->input->post('tanam');
         $panen = $this->input->post('panen');
         $modal_awal = $this->input->post('modal_awal');
         $hasil_jual = $this->input->post('hasil_jual');
         $data = array(
            'id_kelompok' => $idKelompokTani,
            'nama' => $nama,
            'ditanam' => $ditanam,
            'panen' => $panen,
            'modal_awal' => $modal_awal,
            'hasil_jual' => $hasil_jual,
         );
         $this->admin->insertHasil($data);
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      } else {
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      }
   }

   public function updateHasil($id)
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('tanam', 'Di Tanam', 'required');
      $this->form_validation->set_rules('panen', 'Panen', 'required');
      $this->form_validation->set_rules('modal_awal', 'Modal Awal', 'required');
      $this->form_validation->set_rules('hasil_jual', 'Hasil Jual', 'required');
      $idKelompokTani = $this->admin->getHasilByIdRow($id)->id_kelompok;

      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $ditanam = $this->input->post('tanam');
         $panen = $this->input->post('panen');
         $modal_awal = $this->input->post('modal_awal');
         $hasil_jual = $this->input->post('hasil_jual');
         $data = array(
            'id_kelompok' => $idKelompokTani,
            'nama' => $nama,
            'ditanam' => $ditanam,
            'panen' => $panen,
            'modal_awal' => $modal_awal,
            'hasil_jual' => $hasil_jual,
         );
         $this->admin->updateHasil($id, $data);
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert"> Input Data Berhasil !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      } else {
         $this->session->set_flashdata('err-hasil', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">Input data gagal, Silahkan coba lagi !</div>');
         redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
      }
   }

   public function deleteHasil($id)
   {
      $idKelompokTani = $this->admin->getHasilByIdRow($id)->id_kelompok;
      $this->admin->deleteHasil($id);
      redirect('admin/detail_kelompok/galeri/' . $idKelompokTani);
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
