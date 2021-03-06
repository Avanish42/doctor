<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Accordion - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>
</head>
<body>
<h1>Api_Details</h1>
<div id="accordion">
    <h3>Section 1</h3>
    <div>     
        <p><a href="<?php echo base_url('Apidetails/signup'); ?>">Signup</a></p>
        <p><a href="<?php echo base_url('Apidetails/login'); ?>">Login</a></p>
        <p><a href="<?php echo base_url('Webservice/Get_all_cat'); ?>">allcategoreis</a>  (URL: <?php echo base_url('Webservice/Get_all_cat'); ?>)</p>   
        <p><a href="<?php echo base_url('Webservice/Get_all_subcat'); ?>">allsubcategoreis</a>  (URL: <?php echo base_url('Webservice/Get_all_subcat'); ?>)</p>  
<p><a href="<?php echo base_url('Apidetails/get_subcat_bycat'); ?>">get_subcat_bycat</a></p> 
        <p><a href="<?php echo base_url('Apidetails/get_doctor'); ?>">get_doctor_by_subcat</a></p>
<p><a href="<?php echo base_url('Apidetails/get_doctor_by_id'); ?>">get_doctor_by_id</a></p>
<p><a href="<?php echo base_url('Apidetails/send_otp'); ?>">send_otp</a></p>
<p><a href="<?php echo base_url('Apidetails/forget_password'); ?>">forget_password</a></p>
<p><a href="<?php echo base_url('Apidetails/update_password'); ?>">update_password</a></p>
<p><a href="<?php echo base_url('Apidetails/rating'); ?>">rating</a></p>
    </div>
</body>
</html>