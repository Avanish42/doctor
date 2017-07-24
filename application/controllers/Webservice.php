<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this -> load -> library('session');
        $this -> load -> helper('form');
        $this -> load -> helper('url');
        $this -> load -> helper('new_helper');
        $this -> load -> database();
        $this -> load -> library('form_validation');
        $this -> load -> model('Login_model');
        $this -> load -> model('Url_model');
        $this -> load -> model('Merchant_model');
        $this -> load -> helper('string_helper');

    }

     public function add_category()
    {
        $name=$this->input->post('name');
        $image=$this->input->post('image');

        $this->load->library('upload');
    

         $config['upload_path']   = './assets/images/'; 
         $config['allowed_types'] = 'gif|jpg|jpeg|png';
         $config['max_size']      = 10000; 
         $config['file_name']     = time().$name;
         $this->upload->initialize($config);
         $updatedcatimage="";
         if ( $this->upload->do_upload('image'))
         {
          $updatedcatimage='assets/images/'.$this->upload->data('file_name'); 
         }
         else   {
//            echo $this->upload->display_errors();
                }

        $data['name']= $name;
        $data['image']= $updatedcatimage;
        $this->Merchant_model->add_category($data);
        redirect('/Merchant/add_category', 'refresh');
    }
     public function add_sub_category()
    {
        $name=$this->input->post('name');
        $cat_id=$this->input->post('cat_id');

        $data['name']= $name;
        $data['cat_id']= $cat_id;
        $this->Merchant_model->add_sub_category($data);
        redirect('/Merchant/add_sub_category', 'refresh');
    }
     public function deletecat($id)
    {
        $this->Merchant_model->deletecat($id);
        redirect('/Merchant/add_category', 'refresh');
    }
 public function deleteuser($id)
    {
        $this->Merchant_model->deleteuser($id);
        redirect('/Merchant', 'refresh');
    }
     public function deletesubcat($id)
    {
        $this->Merchant_model->deletesubcat($id);
        redirect('/Merchant/add_sub_category', 'refresh');
    }
    public function select_data()
    {
       $id= $this->input->post('key');
            
          $sub_cat_data= $this->Merchant_model->get_sub_cat($id);

         echo json_encode($sub_cat_data);
   }
    public function editdoctor($id)
    {

       $get_doctor= $this->Merchant_model->get_doctor_by_id($id);
       $cat_id=$get_doctor[0]->cat_id;
       $sub_cat=$get_doctor[0]->sub_cat;
        //echo $cat_id;
        $get_cat= $this->Merchant_model->get_cat($cat_id);
        $get_sub_cat= $this->Merchant_model->get_sub_cats($sub_cat);
        $cat_name=$get_cat[0]->name;
        $sub_cat=$get_sub_cat[0]->name;
        //echo $cat_name;

       $doctor['id'] =$get_doctor[0]->id;
       $doctor['cat_id'] =$get_doctor[0]->cat_id;
       $doctor['sub_cat'] =$get_doctor[0]->sub_cat;
       $doctor['name'] =$get_doctor[0]->name;
       $doctor['cat_name'] =$cat_name;
       $doctor['sub_name'] =$sub_cat;
       $doctor['qualification'] =$get_doctor[0]->qualification;
       $doctor['experience'] =$get_doctor[0]->experience;
       $doctor['specialization'] =$get_doctor[0]->specialization;
       $doctor['contact_info'] =$get_doctor[0]->contact_info;
       $doctor['fee'] =$get_doctor[0]->fee;
       $doctor['rating'] =$get_doctor[0]->rating;
       $doctor['image'] =$get_doctor[0]->image;
       $doctor['address'] =$get_doctor[0]->address;
       $doctor['latitude'] =$get_doctor[0]->latitude;
       $doctor['longitude'] =$get_doctor[0]->longitude;
       $doctor['morning_start_time'] =$get_doctor[0]->morning_start_time ;
       $doctor['noon_start_time'] =$get_doctor[0]->noon_start_time ;
       $doctor['morning_close_time'] =$get_doctor[0]->morning_close_time;
       $doctor['noon_close_time'] =$get_doctor[0]->noon_close_time;
       $doctor['evening_start_time'] =$get_doctor[0]->evening_start_time;
       $doctor['evening_close_time'] =$get_doctor[0]->evening_close_time;
        
        $raw_data['doctor']=$doctor;
        $data['page']='doctors';
        $data['sub_page']='view_doctors';
        $this -> load -> view('common/head.php');
        $this->load->view('common/sidebar.php', $data);
        $this->load->view('edit_doctor.php', $raw_data);
        $this -> load -> view('common/footer.php');
    }   
    public function get_doctor()
    {
        $id=$this->input->post('id');
        
        $get_doctor= $this->Merchant_model->get_doctor_by_sub_cat_id($id);
        if($get_doctor)
        {   

            $cat_id=$get_doctor[0]->cat_id;
            $sub_cat=$get_doctor[0]->sub_cat;
            //echo $cat_id;
            $get_cat= $this->Merchant_model->get_cat($cat_id);
            $get_sub_cat= $this->Merchant_model->get_sub_cats($sub_cat);
            $cat_name=$get_cat[0]->name;
            $sub_cat=$get_sub_cat[0]->name;

            $doctor['id'] =$get_doctor[0]->id;
            $doctor['cat_id'] =$get_doctor[0]->cat_id;
            $doctor['sub_cat'] =$get_doctor[0]->sub_cat;
            $doctor['name'] =$get_doctor[0]->name;
            $doctor['cat_name'] =$cat_name;
            $doctor['sub_name'] =$sub_cat;
            $doctor['qualification'] =$get_doctor[0]->qualification;
            $doctor['experience'] =$get_doctor[0]->experience;
            $doctor['specialization'] =$get_doctor[0]->specialization;
            $doctor['contact_info'] =$get_doctor[0]->contact_info;
            $doctor['email'] =$get_doctor[0]->email;
            $doctor['mobile_no'] =$get_doctor[0]->mobile_no;
            $doctor['fee'] =$get_doctor[0]->fee;
            $doctor['rating'] =$get_doctor[0]->rating;
            $doctor['image'] = base_url($get_doctor[0]->image);
            $doctor['address'] =$get_doctor[0]->address;
            $doctor['latitude'] =$get_doctor[0]->latitude;
            $doctor['longitude'] =$get_doctor[0]->longitude;
            $doctor['morning_start_time'] =$get_doctor[0]->morning_start_time ;
            $doctor['morning_close_time'] =$get_doctor[0]->morning_close_time;
            $doctor['evening_start_time'] =$get_doctor[0]->evening_start_time;
            $doctor['evening_close_time'] =$get_doctor[0]->evening_close_time;
         
         $arr = array('status' => 'true', 'message' => 'Get Doctor','data'=> $doctor); 
             header('Content-Type: application/json');      
             echo json_encode($arr);
        }

        else
        {
            $arr = array('status' => 'false', 'message' => 'No doctor found'); 
         header('Content-Type: application/json');      
         echo json_encode($arr);
        }
    }
    public function get_subcat_bycat()
    {
        $id=$this->input->post('id');

        $get_subcat= $this->Merchant_model->get_subcat_bycat($id);
        if($get_subcat)
        {
            $datas= array();
          foreach ($get_subcat as $get_subcat) {
              # code...
            $data['id']= $get_subcat->id;
            $data['name']= $get_subcat->name;
            $data['doctors']= "10";
            $data['image']= base_url('assets/images/1499346170Doctors.png');
            array_push($datas, $data);
          }
          
         $arr = array('status' => 'true', 'message' => 'Get Doctor','data'=> $datas); 
             header('Content-Type: application/json');      
             echo json_encode($arr);
        }

        else
        {
            $arr = array('status' => 'false', 'message' => 'No doctor found'); 
         header('Content-Type: application/json');      
         echo json_encode($arr);
        }
}
    public function get_doctor_by_id()
    {
        $id=$this->input->post('id');

        $get_doctor= $this->Merchant_model->get_doctor_by_id($id);
        if($get_doctor)
        {
            $get_review = $this->Merchant_model->get_review($id);
            $ratings = array();
            foreach ($get_review as $get_review) {
                # code...
                $user_id= $get_review->user_id;
                $get_user = $this->Merchant_model->get_user($user_id);
                $user_name= $get_user[0]->fullname;
                $rating['user_name']=$user_name;
                $rating['rating']= $get_review->rating;
                $rating['comment']= $get_review->comment;
                $rating['created_at']= strtotime($get_review->created_at);
                array_push($ratings, $rating);
            }
            
            $cat_id=$get_doctor[0]->cat_id;
            $sub_cat=$get_doctor[0]->sub_cat;
            //echo $cat_id;
            $get_cat= $this->Merchant_model->get_cat($cat_id);
            $get_sub_cat= $this->Merchant_model->get_sub_cats($sub_cat);
            $cat_name=$get_cat[0]->name;
            $sub_cat=$get_sub_cat[0]->name;

            $doctor['id'] =$get_doctor[0]->id;
            $doctor['cat_id'] =$get_doctor[0]->cat_id;
            $doctor['sub_cat'] =$get_doctor[0]->sub_cat;
            $doctor['name'] =$get_doctor[0]->name;
            $doctor['cat_name'] =$cat_name;
            $doctor['sub_name'] =$sub_cat;
            $doctor['qualification'] =$get_doctor[0]->qualification;
            $doctor['experience'] =$get_doctor[0]->experience;
            $doctor['specialization'] =$get_doctor[0]->specialization;
            $doctor['contact_info'] =$get_doctor[0]->contact_info;
            $doctor['email'] =$get_doctor[0]->email;
            $doctor['mobile_no'] =$get_doctor[0]->mobile_no;
            $doctor['fee'] =$get_doctor[0]->fee;
            $doctor['rating'] =$get_doctor[0]->rating;
            $doctor['image'] = base_url($get_doctor[0]->image);
            $doctor['address'] =$get_doctor[0]->address;
            $doctor['latitude'] =$get_doctor[0]->latitude;
            $doctor['longitude'] =$get_doctor[0]->longitude;
            $doctor['morning_start_time'] =$get_doctor[0]->morning_start_time ;
            $doctor['morning_close_time'] =$get_doctor[0]->morning_close_time;
            $doctor['evening_start_time'] =$get_doctor[0]->evening_start_time;
            $doctor['evening_close_time'] =$get_doctor[0]->evening_close_time;
            $doctor['review']=$ratings;
         
         $arr = array('status' => 'true', 'message' => 'Get Doctor','data'=> $doctor); 
             header('Content-Type: application/json');      
             echo json_encode($arr);
        }

        else
        {
            $arr = array('status' => 'false', 'message' => 'No doctor found'); 
         header('Content-Type: application/json');      
         echo json_encode($arr);
        }
    }
    public function rating()
  
    {
        $user_id=$this->input->post('user_id');
        $doctor_id=$this->input->post('doctor_id');
        $rating=$this->input->post('rating');
        $comment=$this->input->post('comment');

    // get current date 
    $date = date('Y-m-d');
    $current_date=strtotime($date);

        $data['user_id']= $user_id;
        $data['doctor_id']= $doctor_id;
        $data['rating']= $rating;
        $data['comment']= $comment;


        $this->Merchant_model->add_review($data);

        $arr = array('status' => 'true', 'message' => 'Thanks for review','data'=> $data); 
             header('Content-Type: application/json');      
             echo json_encode($arr);

}
    public function add_doctor()
  
    {
        $name=$this->input->post('name');
        $cat_id=$this->input->post('cat_id');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $mobile_no=$this->input->post('mobile_no');
        $sub_cat=$this->input->post('sub_cat');
        $qualification=$this->input->post('qualification');
        $experience=$this->input->post('experience');
        $specialization=$this->input->post('specialization');
        $fee=$this->input->post('fee');
        $contact_info =$this->input->post('contact_info');
        $rating=$this->input->post('rating');
        $latitude =$this->input->post('latitude');
        $longitude  =$this->input->post('longitude');
        $address =$this->input->post('address');
        $morning_start_time =$this->input->post('morning_start_time');
        $noon_start_time =$this->input->post('noon_start_time');
        $morning_close_time =$this->input->post('morning_close_time');
        $noon_close_time =$this->input->post('noon_close_time');
        $evening_start_time =$this->input->post('evening_start_time');
        $evening_close_time =$this->input->post('evening_close_time');
        $image=$this->input->post('image');

        $this->load->library('upload');
    

         $config['upload_path']   = './assets/images/'; 
         $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
         $config['max_size']      = 10000; 
         $config['file_name']     = time().$name;
         $this->upload->initialize($config);
         $updateduserimage="";
         if ( $this->upload->do_upload('image'))
         {
           
            $updateduserimage='assets/images/'.$this->upload->data('file_name'); 
         }
         else  
          {
//            echo $this->upload->display_errors();
          }

        $data['morning_start_time']= $morning_start_time;
        $data['noon_start_time']= $noon_start_time;
        $data['noon_close_time']= $noon_close_time;
        $data['morning_close_time']= $morning_close_time;
        $data['evening_start_time']= $evening_start_time;
        $data['evening_close_time']= $evening_close_time;
        $data['cat_id']= $cat_id;
        $data['name']= $name;
        $data['email']= $email;
        $data['mobile_no']= $mobile_no;
        $data['password']= $password;
        $data['sub_cat']= $sub_cat;
        $data['qualification']= $qualification;
        $data['experience']= $experience;
        $data['specialization']= $specialization;
        $data['fee']= $fee;
        $data['contact_info']= $contact_info;
        $data['rating']= $rating;
        $data['latitude']= $latitude;
        $data['longitude']= $longitude;
        $data['address']= $address;
        $data['image']= $updateduserimage;
       // print_r($data);

        $this->Merchant_model->add_doctor($data);
        redirect('/Merchant/all_doctor', 'refresh');
    }
    public function update_doctor()
  
    {
        $name=$this->input->post('name');
        $id=$this->input->post('id');
        $cat_id=$this->input->post('cat_id');
        $sub_cat=$this->input->post('sub_cat');
        $qualification=$this->input->post('qualification');
        $experience=$this->input->post('experience');
        $specialization=$this->input->post('specialization');
        $fee=$this->input->post('fee');
        $contact_info =$this->input->post('contact_info');
        $rating=$this->input->post('rating');
        $latitude =$this->input->post('latitude');
        $longitude  =$this->input->post('longitude');
        $address =$this->input->post('address');
        $morning_start_time =$this->input->post('morning_start_time');
        $morning_close_time =$this->input->post('morning_close_time');
        $evening_start_time =$this->input->post('evening_start_time');
        $evening_close_time =$this->input->post('evening_close_time');
        $image=$this->input->post('image');

        $this->load->library('upload');
    

         $config['upload_path']   = './assets/images/'; 
         $config['allowed_types'] = 'gif|jpg|jpeg|png';
         $config['max_size']      = 10000; 
         $config['file_name']     = time().$name;
         $this->upload->initialize($config);
         $updateduserimage="";
         if ( $this->upload->do_upload('image'))
         {
           
            $updateduserimage='assets/images/'.$this->upload->data('file_name'); 
         }
         else  
          {
//            echo $this->upload->display_errors();
          }
          if($updateduserimage)
          {
            $data['morning_start_time']= $morning_start_time;
            $data['morning_close_time']= $morning_close_time;
            $data['evening_start_time']= $evening_start_time;
            $data['evening_close_time']= $evening_close_time;
            $data['cat_id']= $cat_id;
            $data['id']= $id;
            $data['name']= $name;
            $data['sub_cat']= $sub_cat;
            $data['qualification']= $qualification;
            $data['experience']= $experience;
            $data['specialization']= $specialization;
            $data['fee']= $fee;
            $data['contact_info']= $contact_info;
            $data['rating']= $rating;
            $data['latitude']= $latitude;
            $data['longitude']= $longitude;
            $data['address']= $address;
            $data['image']= $updateduserimage;
          }
          else
          {
            
            $data['id']= $id;
            $data['morning_start_time']= $morning_start_time;
            $data['morning_close_time']= $morning_close_time;
            $data['evening_start_time']= $evening_start_time;
            $data['evening_close_time']= $evening_close_time;
            $data['cat_id']= $cat_id;
            $data['name']= $name;
            $data['sub_cat']= $sub_cat;
            $data['qualification']= $qualification;
            $data['experience']= $experience;
            $data['specialization']= $specialization;
            $data['fee']= $fee;
            $data['contact_info']= $contact_info;
            $data['rating']= $rating;
            $data['latitude']= $latitude;
            $data['longitude']= $longitude;
            $data['address']= $address;
          }
          //print_r($data);

        $this->Merchant_model->update_doctor($data);
        redirect('/Merchant/all_doctor', 'refresh');
    }
     public function signup_api()
     {
         $fullname=$this->input->post('fullname');
         $email=$this->input->post('email');
         $password=$this->input->post('password');
         $mobile=$this->input->post('mobile');
         $gender=$this->input->post('gender');
         $city=$this->input->post('city');
         $birthday=$this->input->post('birthday');
         //$image=$this->input->post('image');
         // print_r($file);
         $this->load->library('upload');
         $check_user=$this->Merchant_model->check_merchant($email);
        //check email already exists or not 
         if(!$check_user)
         {

         $config['upload_path']   = './assets/images/'; 
         $config['allowed_types'] = 'gif|jpg|jpeg|png';
         $config['max_size']      = 10000; 
         $config['file_name']     = time().$fullname;
         $this->upload->initialize($config);
         $updatedbarimage="";
         if ( $this->upload->do_upload('image'))
         {
           $updatedbarimage='assets/images/'.$this->upload->data('file_name'); 
         }
         else   {
//            echo $this->upload->display_errors();
                }

         $data['fullname']=$fullname;
         $data['email']=$email;
         $data['mobile']=$mobile;
         $data['city']=$city;
         $data['gender']=$gender;
         $data['password']=md5($password);
         $data['birthday']=$birthday;
         $data['role']='role';
        // $data['image']=$updatedbarimage;

         if(  $this->Merchant_model->merchant_insert($data))
         {
            $data['image']= $updatedbarimage?base_url($updatedbarimage):"";
            $raw_data=array('status'=>"true",
                         'message'=>"Register Successfull",
                         "data" =>   $data
                        );
         }
         else
         {
             $raw_data=array('status'=>"false",
                             'message'=>"data not inserted",
                             "data" => ""
                            );
         }
     }
     else
     {
        $raw_data=array('status'=>"false",
                         'message'=>"Email Already Exist",
                         "data" => ""
                        );
     }
         header('Content-Type: application/json'); 
         echo json_encode($raw_data);

     }
     public function login_api()
     {
         $email=$this->input->post('email');
         $password=$this->input->post('password');
         $role=$this->input->post('role');

         if($role=='user')
         {
         $result= $this->Merchant_model->login($email,$password);
         if($result)
         {
            $result[0]->password="*********";
            $result[0]->role="user";
            $result[0]->image= base_url($result[0]->image);

             $raw_data=array('status'=>"true",
                                     'message'=>"Login Successfull",
                                     "data" => $result[0]
                                        );
         }
          else{
             $raw_data=array('status'=>"false",
                                     'message'=>"Login Failed",
                                     "data" =>  ""
                                        );
          }
         header('Content-Type: application/json'); 
          echo json_encode($raw_data);
      }
      elseif($role=='doctor')
      {
         $result= $this->Merchant_model->doctor_login($email,$password);
         if($result)
         {
            $result[0]->password="*********";
            $result[0]->role="doctor";
            $result[0]->image= base_url($result[0]->image);

             $raw_data=array('status'=>"true",
                                     'message'=>"Login Successfull",
                                     "data" => $result[0]
                                        );
         }
          else{
             $raw_data=array('status'=>"false",
                                     'message'=>"Login Failed",
                                     "data" =>  ""
                                        );
          }
         header('Content-Type: application/json'); 
          echo json_encode($raw_data);
      }

     }
       public function Get_all_cat()
    {
        $allcat= $this->Merchant_model->all_category();
        //print_r($package_data);

        if ($allcat) 
        {           
            foreach ($allcat as $allcat1) {
                $allcat1->image= base_url($allcat1->image);

            }
            $arr = array('status' => 'true', 'message' => 'Get All Categories','data'=> $allcat);
             header('Content-Type: application/json');      
              echo json_encode($arr);
            }
            else
            {

                $arr = array('status' => 'false', 'message' => 'No Categories Found'); 
                header('Content-Type: application/json');      
                echo json_encode($arr);
            }
    }
      public function Get_all_subcat()
    {
        $allsubcat= $this->Merchant_model->all_sub_category();
        //print_r($package_data);

        if ($allsubcat) 
        {           
           
            $arr = array('status' => 'true', 'message' => 'Get All Sub Categories','data'=> $allsubcat);
             header('Content-Type: application/json');      
              echo json_encode($arr);
            }
            else
            {

                $arr = array('status' => 'false', 'message' => 'No Sub Categories Found'); 
                header('Content-Type: application/json');      
                echo json_encode($arr);
            }
    }
     public function login_out()
      {
        $this->session->sess_destroy();         
       redirect('/doctor/Login', 'refresh');
      }
      public function send_otp() 
      { 

         $from_email = 'info@doctordirctory.com'; 
         $mobile = $this->input->post('mobile', TRUE); 
         $to_email = $this->input->post('email', TRUE); 
         $otp = $this->input->post('otp', TRUE); 
        $space = " ";
         //Load email library 
        $data['mobile']= $mobile;
        $data['otp']= $otp;

     send_opt_mobile($mobile, $otp);
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Doctor Directory'); 
         $this->email->to($to_email); 
         $this->email->subject('Doctor Directory OTP'); 
         $this->email->message('Doctor Directory OTP'.$space.$otp);  
            
         //Send mail

         if($this->email->send()) 
         {
             //$this->session->set_flashdata("email_sent","Email sent successfully.");
            $arr = array('status' => 'true', 'message' => 'OTP send successfully.'); 
         header('Content-Type: application/json');      
           echo json_encode($arr);
         }
         
         else {
              $arr = array('status' => 'false', 'message' => 'Please try again later'); 
         header('Content-Type: application/json');      
           echo json_encode($arr);
         }

         /*$this->session->set_flashdata("email_sent","Error in sending Email."); 
         $this->load->view('email_form'); */
      } 

       public function update_password()
    {
        $email = $this->input->post('email', TRUE); 
        $old_password = $this->input->post('old_password', TRUE);
        $password = $this->input->post('password', TRUE);

        $data['email']=$email;
        $data['old_password']=$old_password;
        $data['password']=$password;

        if ($dataget =$this->Merchant_model->check_password($data)) {
            if($this->Merchant_model->update_password($data))
            {
                $arr = array('status' => 'ture', 'message' => "Password change successfully"); 
                header('Content-Type: application/json');      
                echo json_encode($arr);
            }
            else{

                $arr = array('status' => 'false', 'message' => 'Please try again later'); 
                header('Content-Type: application/json');      
                echo json_encode($arr);
            }
        }
        else{
            $arr = array('status' => 'false', 'message' => "Invalid password"); 
            header('Content-Type: application/json');      
            echo json_encode($arr);
        }
}
    public function forget_password() 
    { 

        $value = $this->input->post('value', TRUE); 
        if(is_numeric($value))
        {
            $mobile_no=$value;
            $email_id =$this->Merchant_model->check_mail($mobile_no);
            $get_email= $email_id[0]->email;

            $from_email = 'info@doctordirctory.com';  
            $length= 5;
            $chars = "0123456789";
            $password = substr( str_shuffle( $chars ), 0, $length );
            $space = " ";

            $new_password= md5(trim($password));
            $data['password']= $new_password;
            $data['email']= $get_email;

            $this->Merchant_model->forget_password($data);
            send_password_mobile($mobile_no, $password);
            $this->load->library('email'); 

            $this->email->from($from_email, 'Doctor Directory Password'); 
            $this->email->to($get_email);
            $this->email->subject('Doctor Directory Password'); 
            $this->email->message('Doctor Directory Password'.$space.$password); 
                
         //Send mail
             if($this->email->send()) 
             {
                $arr = array('status' => 'true', 'message' => "Password updated"); 
             header('Content-Type: application/json');      
               echo json_encode($arr);
             }
             
             else {
                  $arr = array('status' => 'false', 'message' => "Please try again later"); 
             header('Content-Type: application/json');      
               echo json_encode($arr);
             }
            }
            else
            {
            $get_email=$value;
            $mobile =$this->Merchant_model->check_mobile($get_email);
            $mobile_no= $mobile[0]->mobile;
            //print_r($mobile_no);
            $from_email = 'info@doctordirctory.com';  
            $length= 5;
            $chars = "0123456789";
            $password = substr( str_shuffle( $chars ), 0, $length );
            $space = " ";
            $new_password= md5(trim($password));

            send_password_mobile($mobile_no, $password);
            $data['password']= $new_password;
            $data['email']= $get_email;

            $this->Merchant_model->forget_password($data);
            $this->load->library('email'); 

            $this->email->from($from_email, 'Doctor Directory Password'); 
            $this->email->to($get_email);
            $this->email->subject('Doctor Directory Password'); 
            $this->email->message('Doctor Directory Password'.$space.$password); 
                
             //Send mail
             if($this->email->send()) 
             {
             $arr = array('status' => 'true', 'message' => "Password updated"); 
             header('Content-Type: application/json');      
               echo json_encode($arr);
             }
             
             else 
             {
                $arr = array('status' => 'false', 'message' => "Please try again later"); 
             header('Content-Type: application/json');      
               echo json_encode($arr);
             }
        }
    } 

}