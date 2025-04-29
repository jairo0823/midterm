<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Hotel_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // List all hotels
    public function index() {
        $data['hotels'] = $this->Hotel_model->get_all_hotels();
        $this->load->view('hotels/index', $data);
    }

    // Add new hotel
    public function create() {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('hotels/create');
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'location' => $this->input->post('location'),
                    'description' => $this->input->post('description'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->Hotel_model->create_hotel($data);
                redirect('hotels');
            }
        } else {
            $this->load->view('hotels/create');
        }
    }

    // Edit hotel
    public function edit($id) {
        $hotel = $this->Hotel_model->get_hotel_by_id($id);
        if (!$hotel) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['hotel'] = $hotel;
                $this->load->view('hotels/edit', $data);
            } else {
                $update_data = [
                    'name' => $this->input->post('name'),
                    'location' => $this->input->post('location'),
                    'description' => $this->input->post('description')
                ];
                $this->Hotel_model->update_hotel($id, $update_data);
                redirect('hotels');
            }
        } else {
            $data['hotel'] = $hotel;
            $this->load->view('hotels/edit', $data);
        }
    }

    // Delete hotel
    public function delete($id) {
        $this->Hotel_model->delete_hotel($id);
        redirect('hotels');
    }
}
