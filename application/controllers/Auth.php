<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'username',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required',
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nama' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama' => $user['nama'],
                    'level' => $user['level'],
                ];
                if ($user['level'] == 1) {
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_userdata($data);
                    redirect('pegawai');
                }
            } else {
                $this->session->set_flashdata('message', '<script>alert("Wrong password!")</script>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<script>alert("User is not registered!")</script>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|min_length[4]|max_length[64]|is_unique[user.nama]',
            ['is_unique' => 'This username has already registered!']

        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required|min_length[8]|max_length[255]|matches[password2]',
            [
                'matches' => 'Password Dont Match!'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'trim|required|matches[password]'
        );


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrations';
            $this->load->view("templates/header", $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => 2,
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<script>alert("Register Success!")</script>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<script>alert("Logout Success!")</script>');
        redirect('auth');
    }
}

/* End of file Regsitrasi.php and path \application\controllers\Regsitrasi.php */
