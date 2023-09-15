<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FreelancerRegistration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Freelancer_model'); // Load the Freelancer model
        $this->load->model('Skill_model'); // Load the Skill_model model
        $this->load->model('Bid_model'); // Load the Bid_model model

        
        $this->load->helper('form');
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

        // Get the freelancer's matching works
        $data['matching_works'] = $this->Freelancer_model->get_matching_works($this->session->userdata('user_id'));

        // Retrieve skills associated with the freelancer from the Freelancer_model
        $data['freelancer_skills'] = $this->Freelancer_model->get_freelancer_skills($this->session->userdata('user_id')); // Assuming you store freelancer's user_id in the session

        $data['submitted_bids'] = $this->Bid_model->get_submitted_bids($this->session->userdata('user_id'));
        

        $str ="";

        foreach ($data['submitted_bids'] as  $row){
            $str = $str.",".$row['work_id'];
        }
        $data['submitted_works'] = explode(',',$str);

       
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
    public function submit_bid() {
        $freelancer_id = $this->session->userdata('user_id'); // Assuming you store freelancer's user_id in the session
    
        // Form validation rules
        $this->form_validation->set_rules('work_id', 'Work ID', 'required');
        $this->form_validation->set_rules('bid_amount', 'Bid Amount', 'required|numeric');
        $this->form_validation->set_rules('proposal', 'Proposal', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Handle form validation errors if needed
        } else {
            // Retrieve bid data from the form
            $work_id = $this->input->post('work_id');
            $bid_amount = $this->input->post('bid_amount');
            $proposal = $this->input->post('proposal');
    
            // Insert the bid into the database
            $this->Bid_model->insert_bid($freelancer_id, $work_id, $bid_amount, $proposal);
    
            // Redirect back to the freelancer dashboard or show a success message
            redirect('Freelancer');
        }
    }
    
    public function editBid($work_id) {
        // Check if the freelancer is allowed to edit the bid (e.g., they previously submitted a bid)
        $freelancer_id = $this->session->userdata('user_id'); // Assuming you store freelancer's user_id in the session
        $existing_bid = $this->Bid_model->get_bid_by_freelancer_work($freelancer_id, $work_id);
    
        if (!$existing_bid) {
            // The freelancer doesn't have an existing bid for this work, handle accordingly
            // You can redirect or display an error message
            redirect('freelancer/dashboard');
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Load the edit bid form
            $data['existing_bid'] = $existing_bid;
            $this->load->view('edit_bid_form_view', $data); // Create this view for editing bids
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for updating the bid
            $this->form_validation->set_rules('bid_amount', 'Bid Amount', 'required|numeric');
            $this->form_validation->set_rules('proposal', 'Proposal', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                // Form validation failed, display errors or handle accordingly
                $this->load->view('edit_bid_form_view');
            } else {
                // Form validation passed, update the bid in the database
                $bid_amount = $this->input->post('bid_amount');
                $proposal = $this->input->post('proposal');
    
                // Update the bid using the Bid_model
                $this->Bid_model->update_bid($existing_bid->id, $bid_amount, $proposal);
    
                // Redirect to the freelancer dashboard or show a success message
                redirect('Freelancer');
            }
        }
    }
    
    
    
}
