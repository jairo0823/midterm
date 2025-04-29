<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // Register user
    public function register() {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('users/register');
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->User_model->create_user($data);
                $this->session->set_flashdata('message', 'Account created successfully. Please login.');
                redirect('users/login');
            }
        } else {
            $this->load->view('users/register');
        }
    }

    // Login user
    public function login() {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('users/login');
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->User_model->verify_user($email, $password);
                if ($user) {
                    $this->session->set_userdata('user_id', $user->id);
                    $this->session->set_userdata('user_name', $user->name);
                    $data['user_name'] = $user->name;
                    $this->load->view('users/welcome', $data);
                } else {
                    $data['error'] = 'Invalid email or password';
                    $this->load->view('users/login', $data);
                }
            }
        } else {
            $this->load->view('users/login');
        }
    }

    // Logout user
    public function logout() {
        $this->session->sess_destroy();
        redirect('users/login');
    }

    // List users (admin)
    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('users/index', $data);
    }

    // Edit user
    public function edit($id) {
        $user = $this->User_model->get_user_by_id($id);
        if (!$user) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() == FALSE) {
                $data['user'] = $user;
                $this->load->view('users/edit', $data);
            } else {
                $update_data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email')
                ];
                if ($this->input->post('password')) {
                    $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                }
                $this->User_model->update_user($id, $update_data);
                redirect('users');
            }
        } else {
            $data['user'] = $user;
            $this->load->view('users/edit', $data);
        }
    }

    // Delete user
    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('users');
    }

    // Welcome page
    public function welcome() {
        $user_name = $this->session->userdata('user_name');
        if (!$user_name) {
            redirect('users/login');
        }
        $data['user_name'] = $user_name;
        $this->load->view('users/welcome', $data);
    }
}
