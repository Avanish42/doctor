<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    ADD DOCTORS
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADD DOCTORS</h2>
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
                            echo form_open_multipart('Webservice/add_doctor', $attributes); ?>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="name" class="form-control" aria-required="true">
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="email" class="form-control" aria-required="true">
                                        <label class="form-label">Email Id</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="password" class="form-control" aria-required="true">
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <label style="padding-right: 125px; padding-bottom: 6px">Select category</label>
                                        <select  name='cat_id' class="categories" required>
                                        <option value="">--Select any Categories--</option>
                                             <?php foreach ($merchant as $val) { ?>
                                            <option value="<?php echo isset($val->id) ? $val->id: ""; ?>"><?php echo isset($val->name) ? $val->name: ""; ?>
                                            </option>           
                                            <?php }?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <label style="padding-right: 100px; padding-bottom: 6px">Select sub category</label>
                                          <select id="Sub_Categories" name='sub_cat' class="Sub_Categories" id="sub_cat" required>
                                               <option value="">--Select any Categories--</option>
                                            </select>
                                    </div>
                                </div>  
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="qualification" class="form-control" aria-required="true">
                                        <label class="form-label">Qualification</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="experience" class="form-control" aria-required="true">
                                        <label class="form-label">Experience</label>
                                    </div>
                                </div>                                         
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea required="" class="form-control no-resize" rows="3" cols="20" name="specialization" aria-required="true" minlength="3" maxlength="250"></textarea>
                                        <label class="form-label">Specialization</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" placeholder="Morning Start Time..." class="timepicker form-control" data-dtp="dtp_HIAKo" name="morning_start_time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" placeholder="Noon Start Time..." class="timepicker form-control" data-dtp="dtp_HIAKo" name="noon_start_time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" placeholder="Evening Start Time..." class="timepicker form-control" data-dtp="dtp_HIAKo" name="evening_start_time">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="fee" class="form-control" aria-required="true">
                                        <label class="form-label">Fee</label>
                                    </div>
                                </div> 
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="mobile_no" class="form-control" aria-required="true">
                                        <label class="form-label">Mobile No.</label>
                                    </div>
                                </div> 
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="contact_info" class="form-control" aria-required="true">
                                        <label class="form-label">Contact No.(Other No.)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="rating" class="form-control" aria-required="true" pattern="^[0-5]{1}$">
                                        <label class="form-label">Rating(1 to 5) </label>
                                    </div>
                                </div>  
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="latitude" class="form-control" aria-required="true">
                                        <label class="form-label">Latitude</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" required="" name="longitude" class="form-control" aria-required="true">
                                        <label class="form-label">Longitude</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea required="" class="form-control no-resize" rows="3" cols="20" name="address" aria-required="true" minlength="3" maxlength="250"></textarea>
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" placeholder="Morning Close Time..." class="timepicker form-control" data-dtp="dtp_HIAKo" name="morning_close_time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" placeholder="Noon Close Time..." class="timepicker form-control" data-dtp="dtp_HIAKo" name="noon_close_time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <div class="form-line">
                                            <input type="text" placeholder="Evening Close Time..." class="timepicker form-control" data-dtp="dtp_HIAKo" name="evening_close_time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="">
                                        <input type="file" required="" name="image" class="form-control" aria-required="true" style="padding: 0;">
                                    </div>
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