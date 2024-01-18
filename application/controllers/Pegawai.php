<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Pegawai | Homepage';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['list'] = $this->db->get_where('pemesanan', ['nama_penyetuju' => $this->session->userdata('nama')])->result_array();
        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('pegawai/homepage', $data);
        $this->load->view('templates/footerAdmin');
    }

    public function setuju($id_pesan)
    {
        $dataPesan = $this->db->get_where('pemesanan', ['id_pesanan' => $id_pesan])->row_array();
        $data = [
            'tanggal_disetujui' => time()
        ];

        $this->db->where('id_pemesan', $dataPesan['id_pemesan']);
        $this->db->where('id_driver', $dataPesan['id_driver']);
        $this->db->where('id_penyetuju', $dataPesan['id_penyetuju']);
        $this->db->where('tanggal_pemesanan', $dataPesan['tanggal_pemesanan']);

        $this->db->update('riwayat', $data);

        $this->db->delete('pemesanan', ['id_pesanan' => $id_pesan]);

        $this->session->set_flashdata('message', '<div class="alert alert-success m-0" role="alert">Pemesanan sudah anda setujui!</div>');
        redirect('pegawai');
    }
}

/* End of file Pegawai.php and path \application\controllers\Pegawai.php */
