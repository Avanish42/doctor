<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Add Sub Category
                </h2>
            </div>
            <!-- Add category Validation -->
            <div class="row clearfix">

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>Add Sub Category</h2>
                        </div>
                        <div class="body">
                            <?php $attributes = array('id' => 'form_validation');
                            echo form_open_multipart('Webservice/add_sub_category', $attributes); ?>
                             <div class="form-group form-float">
                                    <div class="form-line">
                                    <label>Select category</label>
                                        <select name="cat_id">
                                             <?php foreach ($merchant as $val) { ?>
                                            <option value="<?php echo isset($val->id) ? $val->id: ""; ?>"><?php echo isset($val->name) ? $val->name: ""; ?>
                                            </option>           
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required>
                                        <label class="form-label">Sub Category Name</label>
                                    </div>
                                </div>                    
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <div class="card">
                        <div class="header">
                            <h2>Doctor Directory</h2>
                        </div>
                        <div class="body">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                     </div>
                </div>
            </div>
            <!-- #END# Add category Validation -->
        </div>
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    List of Sub Category
                </h2>
            </div>
            <!-- List of Sub Category -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Sub Category
                            </h2>
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
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 135px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 217px;" aria-label="Position: activate to sort column ascending">Category Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 217px;" aria-label="Position: activate to sort column ascending">Sub Category</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 41px;" aria-label="Age: activate to sort column ascending">Delete</th></tr>
                                </thead>
                                <tfoot>
                                    <tr><th rowspan="1" colspan="1">Id</th><th rowspan="1" colspan="1">Category Name</th>
                                    <th rowspan="1" colspan="1">Sub Category</th>
                                    <th rowspan="1" colspan="1">Delete</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php  foreach ($subcategory as $val) {
                                    # code...
                                    ?>                             
                                   <tr role="row" class="odd">
                                        <td class="sorting_1"><?php echo $val['id']; ?></td>
                                        <td><?php echo $val['cat_name']; ?></td>
                                        <td><?php echo $val['name']; ?></td>
                                        <td><a class="btn btn-danger waves-effect" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Webservice/deletesubcat');?>/<?php echo $val['id']; ?>">Delete</a></td>
                                    </tr>
                                    <?php }?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>