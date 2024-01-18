<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['title'] = 'Admin Page | Dashboard';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->db->select('FROM_UNIXTIME(tanggal_dikirim, "%Y-%m-%d") as tanggal, COUNT(*) as jumlah');
        $this->db->from('riwayat');
        $this->db->group_by('tanggal');
        $query = $this->db->get()->result_array();

        $tanggal = [];
        $jumlah = [];

        foreach ($query as $row) {

            if ($row['tanggal'] != '1970-01-01') {
                $tanggal[] = $row['tanggal'];
                $jumlah[] = $row['jumlah'];
            }
        }

        $data['tanggal'] = json_encode($tanggal);
        $data['jumlah'] = json_encode($jumlah);


        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footerAdmin');
    }

    public function pemesanan()
    {

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'nDriver',
            'NDriver',
            'trim|required',
            [
                'required' => 'Nama driver harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'Jkendaraan',
            'JKendaraan',
            'trim|required',
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Page | Pemesanan';
            $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
            $data['pesanan'] = $this->db->get('pemesanan')->result_array();
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/pemesanan', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            $this->_pesan();
        }
    }

    private function _pesan()
    {
        $name = $this->db->get_where('user', ['nama' => $this->input->post('nama')])->row_array();
        $DName = $this->db->get_where('user', ['nama' => $this->input->post('nDriver')])->row_array();
        $PName = $this->db->get_where('user', ['nama' => $this->input->post('nPenyetuju')])->row_array();

        if ($DName && $PName) {
            $data = [
                'id_driver' => $DName['id_user'],
                'nama_driver' => $DName['nama'],
                'id_pemesan' => $name['id_user'],
                'nama_pemesan' => $name['nama'],
                'id_penyetuju' => $PName['id_user'],
                'nama_penyetuju' => $PName['nama'],
                'jenis_kendaraan' => $this->input->post('Jkendaraan'),
                'tanggal_pemesanan' => time()
            ];
            $this->db->insert('pemesanan', $data);
            $this->db->insert('riwayat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pemesanan berhasil!</div>');
            redirect('admin/pemesanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Driver / Penyetuju Belum Terdaftar!</div>');
            redirect('admin/pemesanan');
        }
    }

    public function laporan()
    {
        $data['title'] = 'Laporan Pemesanan';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['laporan'] = $this->db->get('riwayat')->result_array();

        $this->db->where('tanggal_disetujui !=', 0);
        $this->db->where('tanggal_dikirim', 0);
        $data['list'] = $this->db->get('riwayat')->result_array();

        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footerAdmin');
    }

    public function kirim($dataR)
    {
        $dataK = $this->db->get_where('riwayat', ['id_riwayat' => $dataR])->row_array();

        $data = [
            'id_riwayat' => $dataR,
            'jenis_kendaraan' => $dataK['jenis_kendaraan'],
            'id_driver' => $dataK['id_driver']
        ];

        $data2 = ['tanggal_dikirim' => time()];

        $this->db->insert('kendaraan', $data);

        $this->db->where('id_riwayat', $dataR);
        $this->db->update('riwayat', $data2);

        $this->session->set_flashdata('message', '<div class="alert alert-success m-0" role="alert">Pemesanan sudah terkirim!</div>');
        redirect('admin/laporan');
    }
}

/* End of file Admin.php and path \application\controllers\Admin.php */
