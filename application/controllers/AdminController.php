<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Freelancer_model'); // Load the Freelancer model
        $this->load->model('Skill_model'); // Load the Skill_model model
        $this->load->model('Bid_model'); // Load the Bid_model model
        $this->load->model('Work_model'); // Load the Work_model model
        $this->load->helper('form');
    }

    public function dashboard(){
        $data['skills'] = $this->Skill_model->get_skills();
        $data['freelancers'] =$this->Freelancer_model->get_freelancer();
        $this->load->view('admin/admin_header');
        $this->load->view('admin_dashboard_view',$data); // Load customer dashboard
        $this->load->view('admin/admin_footer');
    }

    public function releasefundrequests(){
            
        $data['requests'] =$this->Bid_model->get_release_requests();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/releasefundrequests',$data); // Load customer dashboard
        $this->load->view('admin/admin_footer');
    }

    public function releasefund($bidid){
        $this->Bid_model->releasefundbybid($bidid);
        redirect('AdminController/releasefundrequests');
    }
}