<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    private $table = 'bookings';

    public function __construct() {
        parent::__construct();
    }

    // Create new booking
    public function create_booking($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get booking by id
    public function get_booking_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Get all bookings
    public function get_all_bookings() {
        return $this->db->get($this->table)->result();
    }

    // Get bookings by user id
    public function get_bookings_by_user_id($user_id) {
        return $this->db->get_where($this->table, ['user_id' => $user_id])->result();
    }

    // Update booking
    public function update_booking($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete booking
    public function delete_booking($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
