<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_pertanian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function index()
    {
        $data = [
            'title' => 'Hasil Pertanian',
            'hasilSum' => $this->user->getHasilSumPerKelurahan(),
            'hasil' => $this->user->getHasil(),
            'kelurahan' => $this->user->getKelurahan(),
            'jenisTanaman' => $this->user->getJenisTanaman(),
            'kecamatan' => $this->user->getKecamatan(),
            'isSearch' => false,
        ];

        $this->load->view('user/hasil_panen', $data);
    }

    public function cari()
    {
        $idKecamatan = $this->input->post('idKecamatan');

        $data = [
            'title' => 'Hasil Pertanian',
            'hasilSum' => $this->user->getHasilSumPerKelurahan($idKecamatan),
            'hasil' => $this->user->getHasil(),
            'kelurahan' => $this->user->getKelurahan($idKecamatan),
            'jenisTanaman' => $this->user->getJenisTanaman(),
            'kecamatan' => $this->user->getKecamatan(),
            'isSearch' => true,
        ];



        $this->load->view('user/hasil_panen', $data);
    }
}
