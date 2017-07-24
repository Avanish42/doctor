<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidetails extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this -> load -> library('session');
        $this -> load -> helper('form');
        $this -> load -> helper('url');
        $this -> load -> database();
        $this -> load -> library('form_validation');
        $this -> load -> model('Login_model');
    }
    public function index()
    {
        $this -> load -> view('api_views/allapi.php');

    }
    public function get_subcat_bycat()
    {
        $this ->load ->view('api_views/get_subcat_bycat.php');

    }
    public function send_otp()
    {
        $this ->load ->view('api_views/send_otp.php');

    }
    public function rating()
    {
        $this ->load ->view('api_views/rating.php');

    }
    public function update_password()
    {
        $this ->load ->view('api_views/update_password.php');

    }
   public function forget_password()
    {
        $this ->load ->view('api_views/forget_password.php');

    }
    public function get_doctor()
    {
        $this ->load ->view('api_views/get_doctor.php');

    }
    public function get_doctor_by_id()
    {
        $this ->load ->view('api_views/get_doctor_by_id.php');

    }
    public function allcat()
    {
        $this ->load ->view('api_views/allcat.php');

    }
    public function get_all_url_by_business()
    {
        $this->load->view('api_views/get_all_url_by_business.php');
    }

    public function signup()
    {
        $this->load->view('api_views/signup.php');
    }
    public function login()
    {
        $this->load->view('api_views/login.php');
    }



}
