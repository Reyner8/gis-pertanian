<?php
defined('BASEPATH') or exit('No direct script access allowed');

class log extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
    }

    public function index()
    {
        if ($this->session->userdata('logData') == true && $this->session->userdata('role') == 'admin') {
            redirect('admin/beranda');
        } else {
            $this->load->view('login');
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $check = $this->admin->getAdmin($email);
        if ($check) {
            if (password_verify($password, $check[0]->password)) {
                $data = array(
                    'logData' => true,
                    'email' => $email,
                    'username' => $check[0]->username,
                    'role' => 'admin'
                );
                $this->session->set_userdata($data);
                redirect('admin/beranda');
            } else {
                $this->session->set_flashdata('loginFailed', '<div class="text-center text-danger mb-3">Maaf, email atau password yang di input salah</div>');
                redirect('admin/log');
            }
        } else {
            $this->session->set_flashdata('loginFailed', '<div class="text-center text-danger mb-3">Maaf, email atau password yang di input salah</div>');
            redirect('admin/log');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/log', 'refresh');
    }
}
