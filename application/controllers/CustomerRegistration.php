<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerRegistration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model'); // Load the Customer model
        $this->load->model('Skill_model'); // Load the Skill_model
        $this->load->model('Work_model'); // Load the Work_model
        $this->load->model('Bid_model'); // Load the Bid_model
        $this->load->model('Payment_model'); // Load the Bid_model

        $this->load->helper('form');
    }

    public function index() {
        // Load the registration form view for customers
        $this->load->view('site/header');
        $this->load->view('customer_registration_view');
        $this->load->view('site/footer');
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

        // $data['freelancers'] = $this->Freelancer_model->count_freelancers();
        $data['customers'] = $this->Customer_model->count_customers();
        $data['works'] = $this->Work_model->count_works();
        $data['total_sales'] = $this->Work_model->total_sales_by_customer($this->session->userdata('user_id'));
        $data['completed_works'] = $this->Work_model->works_completed($this->session->userdata('user_id'));
        $data['bids'] = $this->Work_model->bids_recieved($this->session->userdata('user_id'));



        $data['skills'] = $this->Skill_model->get_skills();
        $data['posted_works'] = $this->Work_model->get_works_by_customer($this->session->userdata('user_id'));

        foreach($data['posted_works'] as $work){
            $data['work_skills'][$work->id] = $this->Work_model->get_skills_by_work($work->id);
            // Get bids received for the work
            $data['bids_received'][$work->id] = $this->Bid_model->get_bids_for_work($work->id);
 
        }
        $this->load->view('customer/customer_header');
        $this->load->view('customer/customer_home',$data); // Load customer dashboard
        $this->load->view('customer/customer_footer');

    }

    public function register() {
        // Form validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'required|min_length[12]');
        $this->form_validation->set_rules('phonenumber', 'phone Number', 'required|min_length[10]');
        $this->form_validation->set_rules('pan', 'PAN Number', 'required|min_length[10]');
        


        // Add more validation rules as needed

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the registration form with errors
            $this->load->view('customer_registration_view');
        } else {
            $this->load->library('upload');
            $config = array();
            $config['upload_path'] =  realpath(APPPATH . '../uploads');
            $config['allowed_types'] = 'html|jpeg|png';
            $config['max_size']      = '200000';
            $this->upload->initialize($config);
            $this->upload->do_upload('aadhar_file');
            $aadhar_file = $this->upload->data('file_name');
            $this->upload->do_upload('pan_file');

            $pan_file = $this->upload->data('file_name');

            // If validation is successful, insert the customer data into the "users" and "customers" tables
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'aadhar_file' => $aadhar_file,
                'pan_file' => $pan_file,
                'aadhar_number' => $this->input->post('aadhar_number'),
                'pan_number' => $this->input->post('pan'),
                'phone_number' => $this->input->post('phonenumber')


                // Add more fields as needed
            );

            $user_id = $this->Customer_model->register_customer($data);

            if ($user_id) {
                // Registration successful, you can redirect to a success page or do other actions
                // redirect('Login');
             $data['success'] = "HI, ".$data['first_name']." Registration Successful, You can login now";   
        $this->load->view('site/header');
        $this->load->view('login_view',$data);
        $this->load->view('site/footer');
            } else {
                // Registration failed, handle the error
                // You can redirect to an error page or show an error message
                redirect('registration-failed');
            }
        }
    }

    public function works(){
        $data['skills'] = $this->Skill_model->get_skills();
        $data['posted_works'] = $this->Work_model->get_works_by_customer($this->session->userdata('user_id'));

        foreach($data['posted_works'] as $work){
            $data['work_skills'][$work->id] = $this->Work_model->get_skills_by_work($work->id);
            // Get bids received for the work
            $data['bids_received'][$work->id] = $this->Bid_model->get_bids_for_work($work->id);
 
        }
        $this->load->view('customer/customer_header');
        $this->load->view('customer/works',$data); // Load customer dashboard
        $this->load->view('customer/customer_footer');

    }
    public function post_works(){
        $data['skills'] = $this->Skill_model->get_skills();

        $this->load->view('customer/customer_header');
        $this->load->view('customer/post_works_form',$data); // Load customer dashboard
        $this->load->view('customer/customer_footer');

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
    public function view_bids($work_id){
        // Get the work details based on the provided $work_id
        $data['work_details'] = $this->Work_model->get_work_details($work_id); // Implement this method in your Work_model
        $data['bids_received'] = $this->Bid_model->get_bids_for_work($work_id);
        // $this->load->view('view_bids_by_work',$data);

        $this->load->view('customer/customer_header');
        $this->load->view('customer/view_bids_by_work',$data); // Load customer dashboard
        $this->load->view('customer/customer_footer');

    }

    public function accept_bid($bid_id){
        
        // Update the bid status as accepted in your database
        $this->Bid_model->accept_bid($bid_id);

        // Redirect back to the work details page or any other relevant page
        redirect('customer');
    }
    public function acceptedbids(){
        $data['accepted_bids'] = $this->Bid_model->get_accepted_bids_by_customer($this->session->userdata('user_id'));
        $this->load->view('customer/customer_header');
        $this->load->view('customer/customer_acceptedbids',$data); // Load customer dashboard
        $this->load->view('customer/customer_footer');
        
    }

    public function reject_bid(){
        $data['bid_id'] =$this->input->post('bid_id');
        $data['reason'] =$this->input->post('reason');
        $this->Bid_model->reject_bid($data);

        // Redirect back to the work details page or any other relevant page
        redirect('customer');

    }

    public function releasefund($bidid){
        $this->Bid_model->releasefund($bidid);
        redirect('CustomerRegistration/acceptedbids');

    }
    public function refundrequest($bidid){
        $this->Bid_model->refundrequest($bidid);
        redirect('CustomerRegistration/acceptedbids');

    }
    
        
    public function payments(){
        $data['payments'] = $this->Payment_model->get_payment_details($this->session->userdata('user_id'));
        $this->load->view('customer/customer_header');
        $this->load->view('customer/customer_payments',$data); // Load customer dashboard
        $this->load->view('customer/customer_footer');

    }
}
