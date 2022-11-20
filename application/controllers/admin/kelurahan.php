<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kelurahan extends CI_Controller
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
         'title' => 'Kelurahan',
         'name' => $this->session->userdata('username'),
         'dataKelurahan' => $this->admin->getKelurahan(),
         'dataKecamatan' => $this->admin->getKecamatan(),
         'isEdit' => false
      );
      $this->load->view('admin/kelurahan', $data);
   }

   public function addKelurahan()
   {
      $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
      $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'callback_dropdownCheck');
      $this->form_validation->set_rules('lng', 'Longitude', 'required');
      $this->form_validation->set_rules('lat', 'Lattitude', 'required');
      $this->form_validation->set_rules('image', 'Icon', 'callback_gambarCheck');
      $image = $_FILES['image']['name'];

      if ($_FILES['image']['name']) {
         $uploadImage = $this->__uploadImage($image, './assets/images/icon/icon-marker/');
      }

      if ($this->form_validation->run()) {
         $this->admin->insertKelurahan(array(
            'nama' => $this->input->post('kelurahan'),
            'lng' => $this->input->post('lng'),
            'lat' => $this->input->post('lat'),
            'icon' => $uploadImage,
            'id_kecamatan' => $this->input->post('kecamatan')
         ));

         redirect('admin/kelurahan');
      } else {
         $this->index();
      }
   }

   public function editKelurahan($id)
   {
      $data = array(
         'title' => 'Kelurahan',
         'name' => $this->session->userdata('username'),
         'dataKelurahan' => $this->admin->getKelurahan(),
         'dataKecamatan' => $this->admin->getKecamatan(),
         'editData' => $this->admin->getKelurahanById($id),
         'isEdit' => true
      );
      $this->load->view('admin/kelurahan', $data);
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

   public function updateKelurahan($id)
   {
      $image = $_FILES['image']['name'];
      $uploadImage = '';
      if ($image == '') {
         $uploadImage = $this->admin->getKelurahanById($id)->icon;
      } else {
         $uploadImage = $this->__uploadImage($image, './assets/images/icon/icon-marker/');
      }
      $this->admin->updateKelurahan($id, array(
         'nama' =>  $this->input->post('kelurahan'),
         'lng' => $this->input->post('lng'),
         'lat' => $this->input->post('lat'),
         'icon' => $uploadImage,
         'id_kecamatan' =>  $this->input->post('kecamatan')
      ));
      redirect('admin/kelurahan');
   }

   public function deleteKelurahan($id)
   {
      $this->admin->deleteKelurahan($id);
      redirect('admin/kelurahan');
   }

   public function gambarCheck($str)
   {
      if ($_FILES['image']['name'] == '') {

         $this->form_validation->set_message('imagecheck', 'Gambar tidak boleh kosong');
         if ($str == null) {
            return FALSE;
         }
         return FALSE;
      } else {
         return TRUE;
      }
   }

   private function __uploadImage($gambar, $directory)
   {
      // image
      $name = $gambar;
      $allowedFileType = array('png', 'jpg');
      $explode = explode('.', $name);
      $randomName = rand();
      $newName = $randomName . '.' . $explode[1];
      $tmp_file = $_FILES['image']['tmp_name'];
      // -----
      if ($gambar) {
         if (in_array($explode[1], $allowedFileType) === true) {
            move_uploaded_file($tmp_file, $directory . $newName);
            return $newName;
         }
      } else {
         return '';
      }
   }
}
