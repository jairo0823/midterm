<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model {

    private $table = 'hotels';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create new hotel
    public function create_hotel($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get hotel by id
    public function get_hotel_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Get all hotels
    public function get_all_hotels() {
        return $this->db->get($this->table)->result();
    }

    // Update hotel
    public function update_hotel($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete hotel
    public function delete_hotel($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
