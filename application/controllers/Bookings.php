<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->model('Room_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }


    public function index() {
        $data['bookings'] = $this->Booking_model->get_all_bookings();
        $this->load->view('bookings/index', $data);
    }

    
    public function my_bookings() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('users/login');
        }
        $data['bookings'] = $this->Booking_model->get_bookings_by_user_id($user_id);
        $this->load->view('bookings/my_bookings', $data);
    }

    
    public function create() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('users/login');
        }
        $data['rooms'] = $this->Room_model->get_all_rooms();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('room_id', 'Room', 'required');
            $this->form_validation->set_rules('checkin_date', 'Check-in Date', 'required');
            $this->form_validation->set_rules('checkout_date', 'Check-out Date', 'required');
            $this->form_validation->set_rules('guests', 'Guests', 'required|integer');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('bookings/create', $data);
            } else {
                $booking_data = [
                    'user_id' => $user_id,
                    'room_id' => $this->input->post('room_id'),
                    'checkin_date' => $this->input->post('checkin_date'),
                    'checkout_date' => $this->input->post('checkout_date'),
                    'guests' => $this->input->post('guests'),
                    'status' => 'pending',
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->Booking_model->create_booking($booking_data);
                $this->session->set_flashdata('message', 'Booking created successfully. Please proceed to payment.');
                redirect('bookings/my_bookings');
            }
        } else {
            $this->load->view('bookings/create', $data);
        }
    }

    
    public function edit($id) {
        $booking = $this->Booking_model->get_booking_by_id($id);
        if (!$booking) {
            show_404();
        }
        $data['rooms'] = $this->Room_model->get_all_rooms();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('room_id', 'Room', 'required');
            $this->form_validation->set_rules('checkin_date', 'Check-in Date', 'required');
            $this->form_validation->set_rules('checkout_date', 'Check-out Date', 'required');
            $this->form_validation->set_rules('guests', 'Guests', 'required|integer');
            if ($this->form_validation->run() == FALSE) {
                $data['booking'] = $booking;
                $this->load->view('bookings/edit', $data);
            } else {
                $update_data = [
                    'room_id' => $this->input->post('room_id'),
                    'checkin_date' => $this->input->post('checkin_date'),
                    'checkout_date' => $this->input->post('checkout_date'),
                    'guests' => $this->input->post('guests')
                ];
                $this->Booking_model->update_booking($id, $update_data);
                redirect('bookings/my_bookings');
            }
        } else {
            $data['booking'] = $booking;
            $this->load->view('bookings/edit', $data);
        }
    }

   
    public function delete($id) {
        $this->Booking_model->delete_booking($id);
        redirect('bookings/my_bookings');
    }
}
