 <h1>Url is :  <?php echo base_url('Webservice/rating'); ?> </h1>
    This is Post api<br><br>
<div class="col-md-6 col-lg-6 col-sm-6">
	<?php echo form_open('Webservice/rating'); ?>		
		<div class="col-md-6 col-lg-6 col-sm-6">
		<p>user_id<input type="text" name="user_id" ></p>
		<p>doctor_id<input type="text" name="doctor_id" ></p>
		<p>rating<input type="text" name="rating" ></p>
		<p>comment<input type="text" name="comment" ></p>
		</div>	
		<p><input type="submit" name="save" value="Submit"></p>	
	</form>
</div>
