<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Freelancer_model'); // Load the Freelancer model
        $this->load->model('Skill_model'); // Load the Skill_model model
        $this->load->model('Bid_model'); // Load the Bid_model model
        $this->load->model('Work_model'); // Load the Work_model model
        $this->load->model('User_model'); // Load the User_model 
        $this->load->model('Customer_model'); // Load the Customer_model 
        $this->load->helper('form');
    }

    public function dashboard(){
        $data['freelancers'] = $this->Freelancer_model->count_freelancers();
        $data['customers'] = $this->Customer_model->count_customers();
        $data['works'] = $this->Work_model->count_works();
        $data['total_sales'] = $this->Work_model->total_sales();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_home',$data);
        $this->load->view('admin/admin_footer');
    }
    public function skills(){
        $data['skills'] = $this->Skill_model->get_skills();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/skills',$data);
        $this->load->view('admin/admin_footer');
    }

    public function releasefundrequests(){
        $data['requests'] =$this->Bid_model->get_release_requests();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/releasefundrequests',$data); // Load customer dashboard
        $this->load->view('admin/admin_footer');
    }

    public function refundrequests(){
        $data['requests'] =$this->Bid_model->get_refund_requests();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/refundrequests',$data); // Load customer dashboard
        $this->load->view('admin/admin_footer');
    }

    public function releasedfunds(){
        $data['requests'] =$this->Bid_model->get_released_fund_details();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/releasedfunds',$data); // Load customer dashboard
        $this->load->view('admin/admin_footer');
    }
    public function refunddetails(){
        $data['requests'] =$this->Bid_model->get_refund_details();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/refunddetails',$data); // Load customer dashboard
        $this->load->view('admin/admin_footer');
    }

    public function releasefund($bidid){
        $this->Bid_model->releasefundbybid($bidid);
        redirect('AdminController/releasedfunds');
    }

    public function refund($bidid){
        $this->Bid_model->refundbybid($bidid);
        redirect('AdminController/refunddetails');
    }

    public function list_freelancers(){
        $data['freelancers'] =$this->Freelancer_model->get_freelancer();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/list_freelancers',$data);

        $this->load->view('admin/admin_footer');
    }

    public function list_customers(){
        $data['freelancers'] =$this->Customer_model->get_customers();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/list_customers',$data);

        $this->load->view('admin/admin_footer');
    }
    public function enable_user($id,$a){
        $this->User_model->enable_user($id);
        if($a){
            redirect('AdminController/list_freelancers');
        }else{
            redirect('AdminController/list_customers');

        }
    }
    public function disable_user($id,$a){
        $this->User_model->disable_user($id);
        if($a){
            redirect('AdminController/list_freelancers');
        }else{
            redirect('AdminController/list_customers');

        }
    }


    public function delete_user($id,$a){
        $this->User_model->delete_user($id,$a);
        if($a){
            redirect('AdminController/list_freelancers');
        }else{
            redirect('AdminController/list_customers');

        }
    }
    public function list_works(){
        $data['works'] =$this->Work_model->get_works();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/list_works',$data);
        $this->load->view('admin/admin_footer');
    }

    public function delete_work($id){
        $this->Bid_model->delete_work($id);
        $this->Work_model->delete_work_skills($id);
        $this->Work_model->delete_work($id);
        redirect('AdminController/list_works');
    }

}