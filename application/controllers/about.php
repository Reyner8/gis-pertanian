<?php
defined('BASEPATH') or exit('No direct script access allowed');

class about extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('user');
   }

   public function index()
   {
      $data = [
         'title' => 'About Us',
         'about' => $this->user->getAbout()
      ];

      $this->load->view('user/about', $data);
   }
}
