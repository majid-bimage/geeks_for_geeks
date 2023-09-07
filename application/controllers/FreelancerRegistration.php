<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FreelancerRegistration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Freelancer_model'); // Load the Freelancer model
        $this->load->model('Skill_model'); // Load the Freelancer model

        $this->load->helper('form');
        Freelancer_model
    }

    public function index() {
        // Load the registration form view for freelancers
        $this->load->view('freelancer_registration_view');
    }

    
// Define the callback function
public function email_check($email)
{
    // Load the database library if it's not autoloaded
    $this->load->database();

    // Query the 'freelancers' table to check for the email's uniqueness
    $query = $this->db->get_where('freelancers', ['email' => $email]);

    // If no rows are found, the email is unique
    if ($query->num_rows() === 0) {
        return true;
    } else {
        // If there are rows, the email is not unique
        $this->form_validation->set_message('email_check', 'The email address is already in use.');
        return false;
    }
}



    public function register() {
        // Form validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        // Add more validation rules as needed
    

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the registration form with errors
            $this->load->view('freelancer_registration_view');
        } else {
            // If validation is successful, insert the freelancer data into the "users" and "freelancers" tables
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                // Add more fields as needed
            );
    
            $user_id = $this->Freelancer_model->register_freelancer($data);
    
            if ($user_id) {
                // Registration successful, you can redirect to a success page or do other actions
                redirect('index');
            } else {
                // Registration failed, handle the error
                // You can redirect to an error page or show an error message
                redirect('registration-failed');
            }
        }
    }


    public function freelancer_dashboard() {
        // Load the freelancer skills form view

        // Retrieve skills from the Skill_model
        $data['skills'] = $this->Skill_model->get_skills();

        // Retrieve skills associated with the freelancer from the Freelancer_model
        $data['freelancer_skills'] = $this->Freelancer_model->get_freelancer_skills($this->session->userdata('user_id')); // Assuming you store freelancer's user_id in the session

        $this->load->view('freelancer_dashboard_view', $data);

    }

    public function update_skills() {
        $freelancer_id = $this->session->userdata('user_id'); // Assuming you store freelancer's user_id in the session

        if ($this->input->post('add')) {
            // Add a skill to the freelancer's profile
            $skill_id = $this->input->post('add_skill');
            $this->Freelancer_model->add_skill($freelancer_id, $skill_id);
        } elseif ($this->input->post('remove')) {
            // Remove a skill from the freelancer's profile
            $skill_id = $this->input->post('remove_skill');
            $this->Freelancer_model->remove_skill($freelancer_id, $skill_id);
        }

        // Redirect back to the skills management page
        redirect('Freelancer');
    }

    
    
}
