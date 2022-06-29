<?php
defined('BASEPATH') or exit('No direct script access allowed');


class berita extends CI_Controller
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
            'title' => 'Berita',
            'name' => $this->session->userdata('username'),
            'dataBerita' => $this->admin->getBerita(),
        );
        $this->load->view('admin/berita', $data);
    }

    public function addBerita()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'callback_dropdownCheck');
        $this->form_validation->set_rules('gambar', 'Dokter', 'callback_gambarCheck');

        if ($this->form_validation->run()) {
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            $kategori = $this->input->post('kategori');
            $gambar = $_FILES['gambar']['name'];
            $uploadImage = $this->__uploadImage($gambar);
            $data = array(
                'judul' => $judul,
                'isi' => $isi,
                'gambar' => $uploadImage,
                'waktu' => date("Y-m-d"),
                'kategori' => $kategori
            );
            $this->admin->insertBerita($data);
            redirect('admin/berita');
        } else {
            $this->session->set_flashdata('err-berita', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/berita');
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

        if ($_FILES['gambar']['name'] == '') {
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
        $tmp_file = $_FILES['gambar']['tmp_name'];
        // -----
        if (in_array($explode[1], $allowedFileType) === true) {
            move_uploaded_file($tmp_file, './assets/images/berita/' . $newName);
            return $newName;
        }
    }

    public function updateForm($id)
    {
        $data = array(
            'title' => 'BERITA',
            'name' => $this->session->userdata('username'),
            'formData' => $this->admin->getBeritaById($id)
        );
        $this->load->view('admin/updateBerita', $data);
    }

    // NOTE !!!
    public function updateBerita()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $kategori = $this->input->post('kategori');
        $oldImage = $this->admin->getBeritaById($id);
        $gambar = $_FILES['gambar']['name'];
        $upload = $this->__uploadImage($gambar);
        // check form upload
        if ($gambar == '') {
            $gambar = $oldImage[0]->gambar;
        } else {
            // check file types
            if ($upload == '') {
                $this->session->set_flashdata('error', '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            } else {
                unlink("./assets/images/berita/" . $oldImage);
                $gambar = $upload;
            }
        }
        $data = array(
            'judul' => $judul,
            'isi' => $isi,
            'gambar' => $gambar,
            'waktu' => date("Y-m-d"),
            'kategori' => $kategori
        );
        $this->admin->updateBerita($id, $data);

        redirect('admin/berita');
    }

    public function deleteBerita($id)
    {
        $image = $this->admin->getBeritaById($id)[0]->gambar;
        unlink("./assets/images/berita/" . $image);
        $this->admin->deleteBerita($id);
        redirect('admin/berita');
    }
}
