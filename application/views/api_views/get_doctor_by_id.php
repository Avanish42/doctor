<html>
<head>
    <title>Get dorcot by id</title>
</head>
<body>

<?php echo form_open('Webservice/get_doctor_by_id'); ?>

<h1>Url is :  <?php echo base_url('Webservice/get_doctor_by_id'); ?> </h1>
Get doctor by id<br><br>
id*<input type="text" name="id" required><br>
<input type="submit" value="submit"><br>

</form>


</body>
</html>