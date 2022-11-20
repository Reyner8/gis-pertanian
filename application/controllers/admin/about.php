<?php
defined('BASEPATH') or exit('No direct script access allowed');

class about extends CI_Controller
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
         'title' => 'About',
         'name' => $this->session->userdata('username'),
         'about' => $this->admin->getAbout(),
      );
      $this->load->view('admin/about', $data);
   }

   public function updateAbout($id)
   {
      $image = $_FILES['image']['name'];
      $uploadImage = '';
      if ($image == '') {
         $uploadImage = $this->admin->getAbout()->gambar;
      } else {
         $uploadImage = $this->__uploadImage($image, './assets/images/');
      }
      $this->admin->updateAbout($id, array(
         'deskripsi' =>  $this->input->post('deskripsi'),
         'gambar' => $uploadImage,
         'lng' => $this->input->post('lng'),
         'lat' => $this->input->post('lat'),
      ));
      redirect('admin/about');
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

   private function __uploadImage($gambar, $directory)
   {
      // image
      $name = $gambar;
      $allowedFileType = array('png', 'jpg', 'jpeg');
      $explode = explode('.', $name);
      $randomName = rand();
      $newName = $randomName . '.' . $explode[1];
      $tmp_file = $_FILES['image']['tmp_name'];
      // -----
      if (in_array($explode[1], $allowedFileType) === true) {
         move_uploaded_file($tmp_file, $directory . $newName);
         return $newName;
      }
   }
}
