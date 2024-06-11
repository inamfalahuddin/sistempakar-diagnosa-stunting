<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Gejala_model');
        $this->load->model('Terminator_model');
        $this->load->helper('form');
        $this->load->library('form_validation');

        // middleware login
        $this->load->helper('auth_helper');
        check_login();
    }

    public function index()
    {
        $data_gejala = $this->Gejala_model->get_all_gejala();

        $data['title'] = 'Halmaan Diagnosa'; // Set title
        $data['data_gejala'] = $data_gejala;
        $data['data_probabilitas'] = $this->Terminator_model->get_all_terminator();
        $data['content'] = $this->load->view('diagnosa/diagnosa_view', $data, TRUE); // Load view content
        $this->load->view('templates/main_template', $data);
    }

    public function create()
    {
        $this->load->model('Diagnosa_model');

        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('age', 'Umur', 'required');
        $id_diagnosa = $this->Diagnosa_model->generate_diagnosa_code();

        if ($this->form_validation->run() == FALSE) {
            $data_gejala = $this->Gejala_model->get_all_gejala();

            $data['title'] = 'Halmaan Diagnosa'; // Set title
            $data['data_gejala'] = $data_gejala;
            $data['data_probabilitas'] = $this->Terminator_model->get_all_terminator();
            $data['content'] = $this->load->view('diagnosa/diagnosa_view', $data, TRUE);
            $this->load->view('templates/main_template', $data);
        } else {
            $all_post_data = $_POST;

            unset($all_post_data['full_name']);
            unset($all_post_data['age']);
            unset($all_post_data['gender']);

            $data_term = $all_post_data;

            $data_diagnosa = [
                'id' => $id_diagnosa,
                'nama' => $this->input->post('full_name'),
                'umur' => $this->input->post('age'),
                'jenis_kelamin' => $this->input->post('gender'),
            ];

            $data_bobot_diagnosa = array();
            foreach ($data_term as $key => $value) {
                $data_bobot_diagnosa[] = [
                    'id' => 'DIX' . $this->Diagnosa_model->generate_weight_diagnosa_code() . $key,
                    'id_diagnosa' => $data_diagnosa['id'],
                    'id_gejala' => $key,
                    'bobot' => $value,
                ];
            }

            if ($this->Diagnosa_model->tambah_diagnosa($data_diagnosa) && $this->Diagnosa_model->tambah_bobot_diagnosa($data_bobot_diagnosa)) {
                $this->session->set_flashdata('success', 'Diagnosa berhasil disimpan.');

                $data_update = [
                    'id' => $id_diagnosa,
                    'bobot' => $this->diagnosa_engine($id_diagnosa)['nilai_cf'],
                    'hasil' => $this->diagnosa_engine($id_diagnosa)['keterangan'],
                ];

                $this->Diagnosa_model->update_diagnosa($id_diagnosa, $data_update);

                var_dump("oke");
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan diagnosa.');
            }
        }

        redirect(base_url('antropometri'));
    }

    protected function diagnosa_engine($id_user = 'DIA001')
    {
        $this->load->model('Diagnosa_model');

        $CF_user = $this->Diagnosa_model->get_all_bobot_diagnosa_user($id_user);
        $CF_pakar = $this->Gejala_model->get_all_bobot_diagnosa_pakar();

        $CF = array();
        foreach ($CF_pakar as $key => $pakar) {
            $pakar_bobot = floatval($pakar['bobot_gejala']);
            $user_bobot = isset($CF_user[$key]['bobot']) ? floatval($CF_user[$key]['bobot']) : 0;

            $CF[] = $pakar_bobot * $user_bobot;
        }

        $CF_old = floatval($CF[0]);

        for ($i = 1; $i < count($CF); $i++) {
            $CF_old = $this->_calculate_CF($CF_old, floatval($CF[$i]));
        }

        return [
            'keterangan' => $this->_categorize($CF_old),
            'nilai_cf' => round($CF_old, 4) // Membulatkan ke 4 desimal, sesuaikan jika perlu
        ];
    }

    private function _calculate_CF($cf_old, $cf_new)
    {
        return $cf_old + ($cf_new * (1 - $cf_old));
    }

    private function _categorize($cf_value)
    {
        if ($cf_value >= 0.8) {
            return 'Stunting';
        } elseif ($cf_value < 0.8 && $cf_value >= 0.5) {
            return 'Berisiko Stunting';
        } else {
            return 'Normal';
        }
    }
}
