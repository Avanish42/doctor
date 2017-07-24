<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    EDIT DOCTORS
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>EDIT DOCTORS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                           <?php $attributes = array('id' => 'form_validation');
                            echo form_open_multipart('Webservice/update_doctor', $attributes); ?>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="name" class="form-control" aria-required="true" value="<?php echo $doctor['name']; ?>">
                                         <input class="form-control" type="hidden" value="<?php echo $doctor['id']; ?>" name="id" required>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <div class="form-line">
                                        <input type="hidden" required="" name="cat_id" class="form-control" aria-required="true" value="<?php echo $doctor['cat_id']; ?>" readonly>
                                         <input type="text" required="" class="form-control" aria-required="true" value="<?php echo $doctor['cat_name']; ?>" readonly>
                                        <label class="form-label">Category Name</label>
                                    </div>
                                    </div>
                                </div> 
                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <div class="form-line">
                                        <input type="hidden" required="" name="sub_cat" class="form-control" aria-required="true" value="<?php echo $doctor['sub_cat']; ?>" readonly>
                                         <input type="text" required="" name="sub_name" class="form-control" aria-required="true" value="<?php echo $doctor['sub_name']; ?>" readonly>
                                        <label class="form-label"> Sub-category Name</label>
                                    </div>
                                    </div>
                                </div>  
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="qualification" class="form-control" aria-required="true" value="<?php echo $doctor['qualification']; ?>">
                                        <label class="form-label">Qualification</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="experience" class="form-control" aria-required="true" value="<?php echo $doctor['experience']; ?>">
                                        <label class="form-label">Experience</label>
                                    </div>
                                </div>                                         
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea required="" class="form-control no-resize" rows="3" cols="20" name="specialization" aria-required="true" minlength="3" maxlength="250"><?php echo $doctor['specialization']; ?></textarea>
                                        <label class="form-label">Specialization</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $doctor['morning_start_time']; ?>" class="timepicker form-control" data-dtp="dtp_HIAKo" name="morning_start_time">
                                            <label class="form-label">Morning Start Time</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $doctor['noon_start_time']; ?>" class="timepicker form-control" data-dtp="dtp_HIAKo" name="noon_start_time">
                                            <label class="form-label">Noon Start Time</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $doctor['evening_start_time']; ?>" class="timepicker form-control" data-dtp="dtp_HIAKo" name="evening_start_time">
                                            <label class="form-label">Evening Start Time</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="fee" class="form-control" aria-required="true" value="<?php echo $doctor['fee']; ?>">
                                        <label class="form-label">Fee</label>
                                    </div>
                                </div> 
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="contact_info" class="form-control" aria-required="true" value="<?php echo $doctor['contact_info']; ?>">
                                        <label class="form-label">Contact info</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="rating" class="form-control" aria-required="true" pattern="^[0-5]{1}$" value="<?php echo $doctor['rating']; ?>">
                                        <label class="form-label">Rating and Reviews</label>
                                    </div>
                                </div>  
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="latitude" class="form-control" aria-required="true" value="<?php echo $doctor['latitude']; ?>">
                                        <label class="form-label">Latitude</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="longitude" class="form-control" aria-required="true" value="<?php echo $doctor['longitude']; ?>">
                                        <label class="form-label">Longitude</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea required="" class="form-control no-resize" rows="3" cols="20" name="address" aria-required="true" minlength="3" maxlength="250"><?php echo $doctor['address']; ?></textarea>
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $doctor['morning_close_time']; ?>" class="timepicker form-control" data-dtp="dtp_HIAKo" name="morning_close_time">
                                            <label class="form-label">Morning Close Time</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $doctor['noon_close_time']; ?>" class="timepicker form-control" data-dtp="dtp_HIAKo" name="noon_close_time">
                                            <label class="form-label">Morning Close Time</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $doctor['evening_close_time']; ?>" class="timepicker form-control" data-dtp="dtp_HIAKo" name="evening_close_time">
                                            <label class="form-label">Evening Close Time</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">        
                                    <img style="max-height: 100px;" src="<?php echo base_url($doctor['image']);  ?>">
                                 </div>
                                <div class="form-group form-float">
                                        <input type="file"  name="image" class="form-control" aria-required="true" style="padding: 0;">
                                </div>
                           
                                </div>                                       
                                <button type="submit" class="btn btn-primary waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    </section>