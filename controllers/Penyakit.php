<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Penyakit_model');

        // middleware login
        $this->load->helper('auth_helper');
        check_login();
    }

    public function index()
    {
        $data_penyakit = $this->Penyakit_model->get_all_penyakit();

        $data['items'] = $data_penyakit;
        $data['title'] = 'Data Penyakit'; // Set title
        $data['content'] = $this->load->view('penyakit/list_penyakit_view', $data, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }

    public function storagePenyakit()
    {
        $data = [
            'nama_penyakit' => $this->input->post('nama_penyakit'),
        ];

        if ($this->Penyakit_model->tambah_penyakit($data)) {
            $this->session->set_flashdata('success', 'Penyakit berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan penyakit.');
        }

        redirect('penyakit');
    }

    public function deletePenyakit($kode_penyakit)
    {
        if ($this->Penyakit_model->hapus_penyakit($kode_penyakit)) {
            $this->session->set_flashdata('success', 'Penyakit berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus penyakit.');
        }

        redirect('penyakit');
    }

    public function getPenyakitById($id)
    {
        $data_penyakit = $this->Penyakit_model->get_penyakit_by_kode($id);
        echo json_encode($data_penyakit);
    }

    public function editPenyakit()
    {
        $data = [
            'id' => $this->input->post('id_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
        ];

        if ($this->Penyakit_model->update_penyakit($data['id'], $data)) {
            $this->session->set_flashdata('success', 'Penyakit berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah penyakit.');
        }

        redirect('penyakit');
    }
}
