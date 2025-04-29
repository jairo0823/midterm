<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'users';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create new user (register)
    public function create_user($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get user by email
    public function get_user_by_email($email) {
        return $this->db->get_where($this->table, ['email' => $email])->row();
    }

    // Get user by id
    public function get_user_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Update user
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete user
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    // Verify user login credentials
    public function verify_user($email, $password) {
        $user = $this->get_user_by_email($email);
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    // Get all users
    public function get_all_users() {
        return $this->db->get($this->table)->result();
    }
}
