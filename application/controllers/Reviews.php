<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Review_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // List all reviews (admin)
    public function index() {
        $data['reviews'] = $this->Review_model->get_all_reviews();
        $this->load->view('reviews/index', $data);
    }

    // Submit a review
    public function create() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('users/login');
        }
if ($this->input->method() === 'post') {
    $this->form_validation->set_rules('rating', 'Rating', 'required|integer|greater_than[0]|less_than_equal_to[5]');
    $this->form_validation->set_rules('comment', 'Comment', 'required');
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('reviews/create');
    } else {
        $review_data = [
            'user_id' => $user_id,
            'rating' => $this->input->post('rating'),
            'comment' => $this->input->post('comment'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->Review_model->create_review($review_data);
        $this->session->set_flashdata('message', 'Review posted successfully.');
        redirect('reviews');
    }
} else {
    $this->load->view('reviews/create');
}
    }

    // Edit review
    public function edit($id) {
        $review = $this->Review_model->get_review_by_id($id);
        if (!$review) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('rating', 'Rating', 'required|integer|greater_than[0]|less_than_equal_to[5]');
            $this->form_validation->set_rules('comment', 'Comment', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['review'] = $review;
                $this->load->view('reviews/edit', $data);
            } else {
                $update_data = [
                    'rating' => $this->input->post('rating'),
                    'comment' => $this->input->post('comment')
                ];
                $this->Review_model->update_review($id, $update_data);
                redirect('reviews');
            }
        } else {
            $data['review'] = $review;
            $this->load->view('reviews/edit', $data);
        }
    }

    // Delete review
    public function delete($id) {
        $this->Review_model->delete_review($id);
        redirect('reviews');
    }
}
