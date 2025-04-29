<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Room_model');
        $this->load->model('Hotel_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // List all rooms
    public function index() {
        $data['rooms'] = $this->Room_model->get_all_rooms();
        $this->load->view('rooms/index', $data);
    }

    // List rooms by hotel
    public function by_hotel($hotel_id) {
        $data['rooms'] = $this->Room_model->get_rooms_by_hotel_id($hotel_id);
        $data['hotel'] = $this->Hotel_model->get_hotel_by_id($hotel_id);
        $this->load->view('rooms/by_hotel', $data);
    }

    // Add new room
    public function create() {
        $data['hotels'] = $this->Hotel_model->get_all_hotels();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('hotel_id', 'Hotel', 'required');
            $this->form_validation->set_rules('room_type', 'Room Type', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('rooms/create', $data);
            } else {
                $room_data = [
                    'hotel_id' => $this->input->post('hotel_id'),
                    'room_type' => $this->input->post('room_type'),
                    'price' => $this->input->post('price'),
                    'status' => $this->input->post('status'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->Room_model->create_room($room_data);
                redirect('rooms');
            }
        } else {
            $this->load->view('rooms/create', $data);
        }
    }

    // Edit room
    public function edit($id) {
        $room = $this->Room_model->get_room_by_id($id);
        if (!$room) {
            show_404();
        }
        $data['hotels'] = $this->Hotel_model->get_all_hotels();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('hotel_id', 'Hotel', 'required');
            $this->form_validation->set_rules('room_type', 'Room Type', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['room'] = $room;
                $this->load->view('rooms/edit', $data);
            } else {
                $update_data = [
                    'hotel_id' => $this->input->post('hotel_id'),
                    'room_type' => $this->input->post('room_type'),
                    'price' => $this->input->post('price'),
                    'status' => $this->input->post('status')
                ];
                $this->Room_model->update_room($id, $update_data);
                redirect('rooms');
            }
        } else {
            $data['room'] = $room;
            $this->load->view('rooms/edit', $data);
        }
    }

    // Delete room
    public function delete($id) {
        $this->Room_model->delete_room($id);
        redirect('rooms');
    }
}
