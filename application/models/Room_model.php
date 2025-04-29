<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {

    private $table = 'rooms';

    public function __construct() {
        parent::__construct();
    }

    // Create new room
    public function create_room($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get room by id
    public function get_room_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Get all rooms
    public function get_all_rooms() {
        return $this->db->get($this->table)->result();
    }

    // Get rooms by hotel id
    public function get_rooms_by_hotel_id($hotel_id) {
        return $this->db->get_where($this->table, ['hotel_id' => $hotel_id])->result();
    }

    // Update room
    public function update_room($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete room
    public function delete_room($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
