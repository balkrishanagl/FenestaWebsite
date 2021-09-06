@extends('admin.layouts.template_admin')


@section('content')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
     

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form class="form-horizontal" method="POST" action="<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>/save" enctype="multipart/form-data">
             {{ csrf_field() }}
             <input type="hidden" required="" name="id" value="<?php echo isset($data_row['id'])?$data_row['id']:'';?>">

              <div class="box-body">


                
			  
			      <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Compnay Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="company_name" name="company_name" value="<?php echo isset($data_row['company_name'])?$data_row['company_name']:'';?>">
                  </div>
                </div>
				
				      
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">subject</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="subject" name="subject" value="<?php echo isset($data_row['subject'])?$data_row['subject']:'';?>">
                  </div>
          </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="email" name="email" value="<?php echo isset($data_row['email'])?$data_row['email']:'';?>">
                  </div>
                </div>


                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="address" name="address" value="<?php echo isset($data_row['address'])?$data_row['address']:'';?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="country" name="country" value="<?php echo isset($data_row['country'])?$data_row['country']:'';?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Department</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="department" name="department" value="<?php echo isset($data_row['department'])?$data_row['department']:'';?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Contact Person</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="contact_person" name="contact_person" value="<?php echo isset($data_row['contact_person'])?$data_row['contact_person']:'';?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="address" name="address" value="<?php echo isset($data_row['address'])?$data_row['address']:'';?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telephone</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="telephone" name="telephone" value="<?php echo isset($data_row['telephone'])?$data_row['telephone']:'';?>">
                  </div>
                </div>
  				
  				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Website</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="website" name="website" value="<?php echo isset($data_row['website'])?$data_row['website']:'';?>">
                  </div>
          </div>
			

				 
				  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Brief Description</label>

                  <div class="col-sm-10">
						<textarea class="form-control" id="brief_description" name="brief_description" ><?php echo isset($data_row['brief_description'])?$data_row['brief_description']:'';?></textarea> 
            


                  </div>
                </div>
				  
           <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>        
                  <div class="col-sm-10">                       
                  <select name="status" class="form-control select" required  >          
                        @foreach ( Config::get('constants.CONS_CONTACT_STATUS_ARRAY')  as $key =>$val)
                            <?php 
                              $selected='';
                              if(isset($data_row['status']) && $data_row['status']==$key){
                                $selected='selected';
                              }elseif(old('status')==$key){
                                 $selected='selected';
                              } 
                            ?>
                <option value="{{ $key }}"   {{ $selected }}  >
                 {{ $val }}
                </option>
                    @endforeach 
                   </select>
                  </div>
            </div>
           


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Form Filled IP</label>
                  <div class="col-sm-10">
                    <input type="text" readonly=""  class="form-control" id="ip" name="ip" value="<?php echo isset($data_row['ip'])?$data_row['ip']:'';?>">
                  </div>
          </div>

        

              

                <input type="hidden" name="submit_type" id="submit_type" value="1">
                <div class="box-footer pull-right">         
                <button type="submit" class="btn btn-primary" onclick="actionType(1)">Save</button>
                <button type="submit" class="btn bg-olive " onclick="actionType(2)">Save and Countinue</button>  

                  <button type="reset" class="btn btn-default ">Reset</button>
                   <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>'">Back</button>

                    <?php if(isset($data_row['id']) && $data_row['id']!=''){?>
                    <button type="submit" class="btn bg-red " onclick="actionType(3)" >Delete</button>
                    <?php } ?>
                  

              </div>



              </div>
              <!-- /.box-body -->


      </div>
      </div>
      <!-- /.row (main row) -->
</div>
    </section>







    @endsection