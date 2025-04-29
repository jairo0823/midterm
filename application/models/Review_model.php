<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {

    private $table = 'reviews';

    public function __construct() {
        parent::__construct();
    }

    // Create new review
    public function create_review($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get review by id
    public function get_review_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Get all reviews
    public function get_all_reviews() {
        return $this->db->get($this->table)->result();
    }

    // Get reviews by hotel id
    public function get_reviews_by_hotel_id($hotel_id) {
        return $this->db->get_where($this->table, ['hotel_id' => $hotel_id])->result();
    }

    // Update review
    public function update_review($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete review
    public function delete_review($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
