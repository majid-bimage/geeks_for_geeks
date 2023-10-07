<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Load the User model
        $this->load->model('Skill_model'); // Load the Skill_model

        
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index() {
        // Load the login form view
        $this->load->view('site/header');
        $this->load->view('login_view');
        $this->load->view('site/footer');

    }


    public function pre_forgot_password(){
        $data['email'] = null;

        $this->load->view('site/header');
        $this->load->view('site/pre_forgot_password',$data);
        $this->load->view('site/footer');
    }
    public function check_email(){
        $email = $this->input->post('email');
        $existence = $this->User_model->check_email($email);
        if($existence){
            $data['email'] = $email;
            $this->load->view('site/header');
            $this->load->view('site/pre_forgot_password',$data);
            $this->load->view('site/footer');

        }else{
            redirect('pre_forgot_password');
        }
    }

    public function reset_password(){
        $password = $this->input->post('password');
        $re_password = $this->input->post('reenter');
        $email = $this->input->post('email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('reenter', 'Password', 'required|min_length[6]');



        if ($this->form_validation->run() == FALSE) {

          
            $data['email'] = $email;
            $data['error_message'] = "Password validation error";
            $this->load->view('site/header');
            $this->load->view('site/pre_forgot_password',$data);
            $this->load->view('site/footer');
        }else{
            if($password == $re_password){
                $status = $this->User_model->update_password($email,$password);
                if($status){
                    redirect('pre-forgot-password');
                }
                }else{
                    $data['email'] = $email;
                    $data['error_message'] = "Password mismatch";
                    $this->load->view('site/header');
                    $this->load->view('site/pre_forgot_password',$data);
                    $this->load->view('site/footer');
                }
        }

    }
    public function process_login() {
        // Form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login form with errors
            // $this->load->view('login_view');
            redirect('login');
        } else {
            // If validation is successful, attempt to authenticate the user
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            $user = $this->User_model->authenticate_user($email, $password);
    
            if ($user) {
                // Authentication successful, set user session data
                $user_data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'logged_in' => TRUE,
                );
                $this->session->set_userdata($user_data);
                // Redirect to the appropriate dashboard or profile page based on user role
                if ($user->role === 'freelancer') {
                    // $this->load->view('freelancer_dashboard_view',$data); // Load freelancer dashboard
                        redirect('Freelancer');

                } elseif ($user->role === 'customer') {
                    // $this->load->view('customer_dashboard_view',$data); // Load customer dashboard

                    redirect('customer');
                } elseif ($user->role === 'admin') {
                    redirect('Admin'); // Load customer dashboard

                }
            } else {
                // Authentication failed, show an error message
                // $data['error_message'] = 'Invalid email or password';
                // $this->load->view('login_view', $data);
                redirect('login');

            }
        }
    }
    

    public function logout() {
        // Destroy the session and log the user out
        $this->session->sess_destroy();
        redirect('login');
    }
}
