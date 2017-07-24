<?php

class Merchant_model extends CI_Model
{
    public function __construct()
    {
        $this->load->helper('new_helper');
    }

    public function merchant_insert($data)
    {
        $this->db->insert('merchant', $data);
        return $this->db->insert_id();
    }
    public function check_mail($mobile)
    {				
	$this->db->where('mobile',$mobile);
	$this->db->select("email");
	$this->db->from('merchant');
	$query = $this->db->get();			  
	 return $query->result();
    }
    public function check_mobile($get_email)
    {				
	$this->db->where('email',$get_email);
	$this->db->select("mobile");
	$this->db->from('merchant');
	$query = $this->db->get();			  
	return $query->result();
   }
    public function add_category($data)
    {
        $this->db->insert('category', $data);
        return true;
    }
    public function add_review($data)
    {
        $this->db->insert('rating', $data);
        return true;
    }
     public function get_review($id)
    {
        $this->db-> where('doctor_id', $id);
        $this->db->select("*");
        $this->db->from('rating');
        $query = $this->db->get();
        return $query->result();   
    }
  public function get_catname($id)
    {
        $this->db-> where('id', $id);
        $this->db->select("name");
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result();   
    }
     public function get_subcat_bycat($id)
    {
        $this->db-> where('cat_id', $id);
        $this->db->select("*");
        $this->db->from('sub_category');
        $query = $this->db->get();
        return $query->result();   
    }
     public function get_user($id)
    {
        $this->db-> where('id', $id);
        $this->db->select("*");
        $this->db->from('merchant');
        $query = $this->db->get();
        return $query->result();   
    }
    public function add_doctor($data)
    {
        $this->db->insert('doctor', $data);
        return true;
    }
     public function add_sub_category($data)
    {
        $this->db->insert('sub_category', $data);
        return true;
    }
    public function all_category()
    {
        $this -> db -> from('category');
        $query = $this -> db -> get();
        return $query->result();
    }
     public function all_sub_category()
    {
        $this -> db -> from('sub_category');
        $query = $this -> db -> get();
        return $query->result();
    }
    public function deletecat($id)
    {
        $this->db-> where('id', $id);
        $query = $this->db->delete('category');   
    }
    public function deleteuser($id)
    {
        $this->db-> where('id', $id);
        $query = $this->db->delete('merchant');   
    }
    public function deletesubcat($id)
    {
        $this->db-> where('id', $id);
        $query = $this->db->delete('sub_category');   
    }
     public function all_doctor()
    {
        $this -> db -> from('doctor');
        $query = $this -> db -> get();
        return $query->result();
    }
     public function get_doctor_by_id($id)
    {
        $this->db-> where('id', $id);
        $this->db->select("*");
        $this->db->from('doctor');
        $query = $this->db->get();
        return $query->result();   
    }
     public function get_doctor_by_sub_cat_id($id)
    {
        $this->db-> where('sub_cat', $id);
        $this->db->select("*");
        $this->db->from('doctor');
        $query = $this->db->get();
        return $query->result();   
    }
     public function get_sub_cat($id)
    {
        $this->db->where('cat_id',$id);
        $this->db->select("*");
        $this->db->from('sub_category');
        $query = $this->db->get();          
        return $query->result();    
    }
    public function get_sub_cats($id)
    {
        $this->db->where('id',$id);
        $this->db->select("*");
        $this->db->from('sub_category');
        $query = $this->db->get();          
        return $query->result();    
    }
     public function update_doctor($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('doctor',$data);
    }
     public function get_cat($id)
    {
        $this->db->where('id',$id);
        $this->db->select("*");
        $this->db->from('category');
        $query = $this->db->get();          
        return $query->result();
    }
    public function login($email,$password)
    {
        $this->db->where('email',$email);
        $this->db->where('password',md5($password));
        $this -> db -> from('merchant');
        $query = $this -> db -> get();
        return $query->result();
    }
    public function doctor_login($email,$password)
    {
        $this->db->where('email',$email);
        $this->db->where('password',md5($password));
        $this -> db -> from('doctor');
        $query = $this -> db -> get();
        return $query->result();
    }
    public function  check_merchant($email)
    {
    	$this->db->where('email',$email);
        $this -> db -> from('merchant');
        $query = $this -> db -> get();
        return $query->result();
    }

    public function get_all_merchant()
    {
        $this -> db -> from('merchant');
        $query = $this -> db -> get();
        return $query->result();
    }
    public function check_password($data)
   {				
	$password= $data['old_password'];
	$new_password= md5(trim($password));
	$condition['email']=$data['email'];
	$condition['password']= $new_password;
	$this->db->where($condition);
	$this->db->from('merchant');				
	$query = $this->db->get();				
	return $query->result();		
    }
    public function update_password($data)
    {		
	$email = $data['email'];
	$old_password = $data['old_password'];
	$get_old_password= md5(trim($old_password));
	$update_password = $data['password'];
	$new_password= md5(trim($update_password));
	$datas['password']=$new_password;
	$this->db->where('email',$email);
	$this->db->where('password',$get_old_password);
	$this->db->update('merchant', $datas);
	return true;
   }
   public function forget_password($data)
    {		
	$email = $data['email'];
	$password = $data['password'];
	$update_password = $data['password'];
	$new_password= md5(trim($update_password));
	$datas['password']=$new_password;
	$this->db->where('email',$email);
	$this->db->update('merchant', $datas);
	return true;
   }

}
