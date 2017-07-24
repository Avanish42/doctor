<html>
<head>
	<title>SignUp</title>
</head>
<body>

  <?php echo form_open_multipart('Webservice/signup_api'); ?> 

    <h1>Url is :  <?php echo base_url('Webservice/signup_api'); ?> </h1>
    This is Post api<br><br>
    fullname* <input type="text " name="fullname" required><br>
    email*<input type="text" name="email" required><br>
    password*<input type="password" name="password" required><br>
    city*<input type="text" name="city" required><br>
mobile*<input type="text" name="mobile" required><br>
dob*<input type="text" name="birthday" required><br>
<input type="radio" name="gender" value="male" checked> male<br>
  <input type="radio" name="gender" value="female"> female<br>
  <input type="radio" name="gender" value="other"> other  <br>
    <input type="submit" value="Signup"><br>

</form>
 

</body>
</html>