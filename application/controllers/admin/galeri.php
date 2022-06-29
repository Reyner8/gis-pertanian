<?php
defined('BASEPATH') or exit('No direct script access allowed');

class galeri extends CI_Controller
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
         'title' => 'Galeri Lokasi',
         'name' => $this->session->userdata('username'),
         'dataLokasi' => $this->admin->getLokasi(),
         'dataGaleri' => $this->admin->getGaleri()
      );
      $this->load->view('admin/galeri', $data);
   }

   public function addGaleri()
   {
      $this->form_validation->set_rules('lokasi', 'Lokasi', 'callback_dropdownCheck');
      $this->form_validation->set_rules('image', 'Gambar', 'callback_gambarCheck');

      if ($this->form_validation->run()) {
         $image = $_FILES['image']['name'];
         $id_lokasi = $this->input->post('lokasi');

         foreach ($image as $key => $value) {
            $newImage = $this->__uploadImage($key, $value);
            $this->admin->insertGaleri(array(
               'nama' => $newImage,
               'id_lokasi' => $id_lokasi,
            ));
         }
         redirect('admin/galeri');
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

   public function deleteGaleri($id)
   {
      $this->admin->deleteGaleri($id);
      redirect('admin/galeri');
   }
}
