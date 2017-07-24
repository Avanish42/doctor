<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller
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
        $this -> load -> model('Merchant_model');
    }

    public function index()
    {
       
            $data['merchant']=$this->Merchant_model->get_all_merchant();

            $data['page']='user';
            $this -> load -> view('common/head.php');
            $this->load->view('common/sidebar.php',$data);
            $this->load->view('merchant_view.php',$data);
            $this -> load -> view('common/footer.php');
    }
    public function add_category()
    {
       
           $data['merchant']=$this->Merchant_model->all_category();

             $data['page']='caetory';
            $this -> load -> view('common/head.php');
            $this->load->view('common/sidebar.php', $data);
            $this->load->view('add_category.php', $data);
            $this -> load -> view('common/footer.php');

    }
    public function add_sub_category()
    {
        
           $data['merchant']=$this->Merchant_model->all_category();
           $get_subcat=$this->Merchant_model->all_sub_category();
         $subcats= array();  
foreach ($get_subcat as $get_subcat) 
{
    $subcat['name']= $get_subcat->name;
    $subcat['id']= $get_subcat->id;
    $subcat['image']= $get_subcat->image;
    $cat_id= $get_subcat->cat_id;
    $get_catname=$this->Merchant_model->get_catname($cat_id);
    $subcat['cat_name']= $get_catname[0]->name;

    array_push($subcats, $subcat);
}
$data['subcategory']=$subcats;

            $data['page']='subcaetory';
            $this -> load -> view('common/head.php');
            $this->load->view('common/sidebar.php', $data);
            $this->load->view('add_sub_category.php', $data);
            $this -> load -> view('common/footer.php');
    }
    public function all_doctor()
    {
        
            $data['merchant']=$this->Merchant_model->all_doctor();

            $data['page']='doctors';
            $data['sub_page']='view_doctors';
            $this -> load -> view('common/head.php');
            $this->load->view('common/sidebar.php', $data);
            $this->load->view('all_doctor.php', $data);
            $this -> load -> view('common/footer.php');

    }
    public function add_doctor()
    {
       
           $data['merchant']=$this->Merchant_model->all_category();
            $data['page']='doctors';
            $data['sub_page']='add_doctor';
            $this -> load -> view('common/head.php');
            $this->load->view('common/sidebar.php', $data);
            $this->load->view('add_doctor.php', $data);
            $this -> load -> view('common/footer.php');
    }
}