<html>
<head>
	<title>SignUp</title>
</head>
 <body> 
 <h1>Url is :  <?php echo base_url('Webservice/send_otp'); ?> </h1>
    This is Post api<br><br>
      <?php 
         echo $this->session->flashdata('email_sent'); 
         echo form_open('/Webservice/send_otp'); 
      ?> 	
     <p>email<input type = "text" name = "email" required /> </p>
     <p>mobile<input type="tel" name="mobile" size="10" min="10" required></p>
     <p>otp<input type="tel" name="otp" size="10" min="10" required></p>
      <input type = "submit" value = "SEND OTP"> 		
      <?php 
         echo form_close(); 
      ?> 
   </body>
</html>