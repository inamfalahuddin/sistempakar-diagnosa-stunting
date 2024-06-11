<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terminator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Terminator_model');

        // middleware login
        $this->load->helper('auth_helper');
        check_login();
    }

    public function index()
    {
        $data_gejala = $this->Terminator_model->get_all_terminator();
        $data['data'] = $data_gejala;
        $data['title'] = 'Data Terminator Probabilitas'; // Set title
        $data['content'] = $this->load->view('terminator/list_terminator_view', $data, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }

    public function storeGejala()
    {
        $kode_gejala = $this->Gejala_model->generate_gejala_code();
        $data = [
            'kode_gejala' => $kode_gejala,
            'nama_gejala' => $this->input->post('nama_gejala'),
            'bobot_gejala' => $this->input->post('bobot_gejala'),
        ];

        if ($this->Gejala_model->tambah_gejala($data)) {
            $this->session->set_flashdata('success', 'Gejala berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan gejala.');
        }

        redirect('gejala');
    }

    public function deleteGejala($kode_gejala)
    {
        if ($this->Gejala_model->hapus_gejala($kode_gejala)) {
            $this->session->set_flashdata('success', 'Gejala berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus gejala.');
        }

        redirect('gejala');
    }

    public function getGejalaById($id)
    {
        $data_gejala = $this->Gejala_model->get_gejala_by_kode($id);
        echo json_encode($data_gejala);
    }

    public function editGejala()
    {
        $data = [
            'kode_gejala' => $this->input->post('kode_gejala'),
            'nama_gejala' => $this->input->post('nama_gejala'),
            'bobot_gejala' => $this->input->post('bobot_gejala'),
        ];

        if ($this->Gejala_model->update_gejala($data['kode_gejala'], $data)) {
            $this->session->set_flashdata('success', 'Gejala berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah gejala.');
        }

        redirect('gejala');
    }
}
