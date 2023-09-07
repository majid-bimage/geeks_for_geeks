<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Skill_model'); // Load the Skill model
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index() {
        // Load the skills form view
        $this->load->view('admin_dashboard_view');
    }

    public function add_skill() {
        // Form validation rules
        $this->form_validation->set_rules('skill_name', 'Skill Name', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the skills form with errors
            $this->load->view('skills_form_view');
        } else {
            // If validation is successful, insert the skill data into the "skills" table
            $data = array(
                'skill_name' => $this->input->post('skill_name'),
                'description' => $this->input->post('description'),
                // Add more fields as needed
            );

            $this->Skill_model->insert_skill($data);

            // Redirect to a success page or reload the form with a success message
            redirect('Skills');
        }
    }
}
