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
             <input type="hidden" required="" name="id" value="{{ (isset($data_row->id))?$data_row->id:'' }}">

              <div class="box-body">

                 

           



                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Form Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="form_name" name="form_name" value="{{ (isset($data_row->form_name))?$data_row->form_name:old('form_name') }}">
                  </div>
                </div>
                  

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ingredient</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="ingredient" name="ingredient" value="{{ (isset($data_row->ingredient))?$data_row->ingredient:old('ingredient') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Packdetails</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="packdetails" name="packdetails" value="{{ (isset($data_row->packdetails))?$data_row->packdetails:old('packdetails') }}">
                  </div>
                </div>



               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Countries</label>        
                  <div class="col-sm-10"> 

                    <?php
         $countries_ids_array=array();
        if(isset($data_row['countries'])){
          $countries_ids_array=explode(',',$data_row['countries']);        
        }  

        ?>

                <select name="countries[]" class="form-control select select2" multiple="" >
        
                           <option value=""></option>
                           <?php foreach ($countries as $key => $country) { ?>
                             <option value="<?php echo $country->name;?>"  <?php echo (in_array($country->name,$countries_ids_array))?'selected':'';?>>
                              <?php echo $country->name;?></option>
                       
                        <?php } ?>
                   </select>
                  </div>
            </div>


               

              
                
             <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>        
                  <div class="col-sm-10">                       
                  <select name="status" class="form-control select" required  >          
                        @foreach ( Config::get('constants.CONS_STATUS_ARRAY')  as $key =>$val)
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