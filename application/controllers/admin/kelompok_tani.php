<?php
defined('BASEPATH') or exit('No direct script access allowed');


class kelompok_tani extends CI_Controller
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
         'title' => 'Kelompok Tani',
         'name' => $this->session->userdata('username'),
         'dataKelompokTani' => $this->admin->getKelompokTani(),
         'dataKelurahan' => $this->admin->getKelurahan()
      );
      $this->load->view('admin/kelompok_tani', $data);
   }

   public function searchData()
   {
      $searchData = $this->input->post('search');
      $data = array(
         'title' => 'DOKTER',
         'name' => $this->session->userdata('username'),
         'dataDokter' => $this->admin->getDokterByName($searchData),
         'dataSpesialis' => $this->admin->getSpesialis(),
         'dataLokasi' => $this->admin->getLokasi(),
      );
      $this->load->view('admin/dokter', $data);
   }

   public function addKelompokTani()
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('lng', 'Longitude', 'required');
      $this->form_validation->set_rules('lat', 'Lattitude', 'required');
      $this->form_validation->set_rules('image', 'Icon', 'callback_gambarCheck');
      $this->form_validation->set_rules('id_kelurahan', 'Kelurahan', 'callback_dropdownCheck');


      if ($this->form_validation->run()) {
         $nama = $this->input->post('nama');
         $alamat = $this->input->post('spesialis');
         $lng = $this->input->post('lng');
         $lat = $this->input->post('lat');
         $id_kelurahan = $this->input->post('id_Kelurahan');
         $image = $_FILES['image']['name'];
         $uploadImage = $this->__uploadImage($image);
         $getKelompokTani = $this->admin->getKelompokTaniByName($nama);
         var_dump($getKelompokTani);
         die;
         if ($getKelompokTani == '') {
            $data = array(
               'id_kelurahan' => $id_kelurahan,
               'nama' => $nama,
               'alamat' => $alamat,
               'lng' => $lng,
               'lat' => $lat,
               'icon' => $uploadImage
            );
            $this->admin->insertKelompokTani($data);
            redirect('admin/kelompok_tani');
         } else {
            $this->session->set_flashdata('err-kelompokTani', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Input Gagal, Kelompok Tani yang diinput sudah ada!!</div>');
            $this->index();
         }
      } else {
         $this->session->set_flashdata('err-kelompokTani', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
         $this->index();
      }
   }

   public function addPraktik($idDokter)
   {
      $this->form_validation->set_rules('lokasi', 'Lokasi', 'callback_dropdownCheck');

      if ($this->form_validation->run()) {
         $lokasi = $this->input->post('lokasi');
         $data = array(
            'id_dokter' => $idDokter,
            'id_lokasi' => $lokasi,
         );
         $this->admin->insertPraktik($data);
         redirect('admin/dokter');
      } else {
         $this->session->set_flashdata('err-dokter', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
         $this->index();
      }
   }

   public function editDokter($id)
   {
      $data = array(
         'title' => 'DOKTER',
         'name' => $this->session->userdata('username'),
         'dataDokter' => $this->admin->getDokter_id($id),
         'dataSpesialis' => $this->admin->getSpesialis(),
         'dataLokasi' => $this->admin->getLokasi(),
      );
      $this->load->view('admin/updateDokter', $data);
   }

   public function updateDokter($idDokter)
   {
      $name = $this->input->post('name');
      $spesialis = $this->input->post('spesialis');
      $bpjs = $this->input->post('bpjs');
      $tlp = $this->input->post('telepon');
      $image = $_FILES['image']['name'];
      $uploadImage = '';
      if ($image == '') {
         $uploadImage = $this->admin->getDokter_id($idDokter)->foto;
      } else {
         $uploadImage = $this->__uploadImage($image);
      }
      $data = array(
         'nama' => $name,
         'foto' => $uploadImage,
         'bpjs' => $bpjs,
         'telepon' => $tlp,
         'id_spesialis' => $spesialis
      );
      $this->admin->updateDokter($idDokter, $data);
      redirect('admin/dokter');
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
      if ($_FILES['image']['name'] == '') {

         $this->form_validation->set_message('dropdownCheck', 'Please Select Your {field}');
         if ($str == null) {
            return FALSE;
         }
         return FALSE;
      } else {
         return TRUE;
      }
   }

   private function __uploadImage($gambar)
   {
      // image
      $name = $gambar;
      $allowedFileType = array('png', 'jpg');
      $explode = explode('.', $name);
      $randomName = rand();
      $newName = $randomName . '.' . $explode[1];
      $tmp_file = $_FILES['image']['tmp_name'];
      // -----
      if (in_array($explode[1], $allowedFileType) === true) {
         move_uploaded_file($tmp_file, './assets/images/dokter/' . $newName);
         return $newName;
      }
   }

   public function detailDokter($idDokter)
   {
      $data = array(
         'title' => 'Dokter',
         'name' => $this->session->userdata('username'),
         'dokter' => $this->admin->getDetailDokterById($idDokter),
         'jadwal' => $this->admin->getDetailJadwal($idDokter),
         'lokasi' => $this->admin->getDetailLokasi($idDokter),
         'dropdown' => $this->admin->getLokasi()
      );
      $this->load->view('admin/detailDokter', $data);
   }

   public function deleteDokter($id)
   {
      $image = $this->admin->getDokterById($id)[0]->foto;
      unlink("./assets/images/dokter/" . $image);
      $this->admin->deleteDokter($id);
      redirect('admin/dokter');
   }

   public function deleteJadwal($id)
   {
      $this->admin->deleteJadwal($id);
      redirect('admin/dokter');
   }

   public function deletePraktik()
   {
      $idLokasi =  $this->uri->segment(4);
      $idDokter =  $this->uri->segment(5);
      $this->admin->deleteLokasiPraktik($idLokasi, $idDokter);
      redirect('admin/dokter');
   }
}
