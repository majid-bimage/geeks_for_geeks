<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerRegistration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model'); // Load the Customer model
        $this->load->model('Skill_model'); // Load the Skill_model
        $this->load->model('Work_model'); // Load the Skill_model

        

        
        $this->load->helper('form');
    }

    public function index() {
        // Load the registration form view for customers
        $this->load->view('customer_registration_view');
    }

       
    // Define the callback function
    public function email_check($email)
    {
        // Load the database library if it's not autoloaded
        $this->load->database();

        // Query the 'freelancers' table to check for the email's uniqueness
        $query = $this->db->get_where('customers', ['email' => $email]);

        // If no rows are found, the email is unique
        if ($query->num_rows() === 0) {
            return true;
        } else {
            // If there are rows, the email is not unique
            $this->form_validation->set_message('email_check', 'The email address is already in use.');
            return false;
        }
    }

    public function customer_dashboard(){
        $data['skills'] = $this->Skill_model->get_skills();
        $this->load->view('customer_dashboard_view',$data); // Load customer dashboard
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
            $this->load->view('customer_registration_view');
        } else {
            // If validation is successful, insert the customer data into the "users" and "customers" tables
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                // Add more fields as needed
            );

            $user_id = $this->Customer_model->register_customer($data);

            if ($user_id) {
                // Registration successful, you can redirect to a success page or do other actions
                redirect('CustomerRegistration');
            } else {
                // Registration failed, handle the error
                // You can redirect to an error page or show an error message
                redirect('registration-failed');
            }
        }
    }
    public function post_work() {
        // Form validation rules
        $this->form_validation->set_rules('work_title', 'Work Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required|integer');
        $this->form_validation->set_rules('budget', 'Budget', 'required|numeric');
        $this->form_validation->set_rules('skills[]', 'Skills Required', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the work post form with errors
            $data['skills'] = $this->Skill_model->get_skills(); // Load skills from the Skill_model
            $this->load->view('customer_dashboard_view', $data);
            // redirect('customer');

        } else {
            // If validation is successful, insert the work data into the "works" table
            $data = array(
                'customer_id' => $this->session->userdata('user_id'),
                'work_title' => $this->input->post('work_title'),
                'description' => $this->input->post('description'),
                'duration' => $this->input->post('duration'),
                'budget' => $this->input->post('budget'),
            );
    
            // Insert the work data and return the inserted work's ID
            $work_id = $this->Work_model->insert_work($data);
    
            // Insert selected skills into a separate table, e.g., "work_skills"
            $selected_skills = $this->input->post('skills');
            $this->Work_model->insert_work_skills($work_id, $selected_skills);
    
            // Redirect to a success page or reload the form with a success message
            redirect('customer');
        }
    }
        
}
