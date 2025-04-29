<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    private $table = 'payments';

    public function __construct() {
        parent::__construct();
    }

    // Create new payment
    public function create_payment($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get payment by id
    public function get_payment_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Get all payments
    public function get_all_payments() {
        return $this->db->get($this->table)->result();
    }

    // Get payments by booking id
    public function get_payments_by_booking_id($booking_id) {
        return $this->db->get_where($this->table, ['booking_id' => $booking_id])->result();
    }

    // Update payment
    public function update_payment($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete payment
    public function delete_payment($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
