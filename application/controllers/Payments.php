<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Booking_model');
        $this->load->model('Room_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // List all payments (admin)
    public function index() {
        $data['payments'] = $this->Payment_model->get_all_payments();
        $this->load->view('payments/index', $data);
    }

    // Make payment for a booking
    public function create($booking_id = null) {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('users/login');
        }
        if (!$booking_id) {
            show_404();
        }
        $booking = $this->Booking_model->get_booking_by_id($booking_id);
        if (!$booking || $booking->user_id != $user_id) {
            show_error('Invalid booking');
        }
        $room = $this->Room_model->get_room_by_id($booking->room_id);
        $amount = $room ? $room->price : 0;
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
            if ($this->form_validation->run() == FALSE) {
                $data['booking'] = $booking;
                $data['amount'] = $amount;
                $this->load->view('payments/create', $data);
            } else {
                $payment_data = [
                    'booking_id' => $booking_id,
                    'amount' => $this->input->post('amount'),
                    'payment_method' => $this->input->post('payment_method'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->Payment_model->create_payment($payment_data);
                // Update booking status to confirmed
                $this->Booking_model->update_booking($booking_id, ['status' => 'confirmed']);
                $this->session->set_flashdata('message', 'Payment successful. Booking confirmed.');
                redirect('bookings/my_bookings');
            }
        } else {
            $data['booking'] = $booking;
            $data['amount'] = $amount;
            $this->load->view('payments/create', $data);
        }
    }

    // Delete payment
    public function delete($id) {
        $this->Payment_model->delete_payment($id);
        redirect('payments');
    }
}
