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
                  <label for="inputEmail3" class="col-sm-2 control-label">List Name</label>        
                  <div class="col-sm-10">                   
                <select name="list_id" class="form-control select select2">
        
                           
                           <?php foreach ($lists as $key => $list) { ?>
                             <option value="<?php echo $list->id;?>" <?php echo (isset($data_row['list_id']) && $data_row['list_id']==$list->id)?'selected':'';?>><?php echo $list->name;?></option>
                       
                        <?php } ?>
                   </select>
                  </div>
            </div>



                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="name" name="name" value="{{ (isset($data_row->name))?$data_row->name:old('name') }}">
                  </div>
                </div>
                  

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pack Size</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="pack_size" name="pack_size" value="{{ (isset($data_row->pack_size))?$data_row->pack_size:old('pack_size') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Old MRP</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="old_mrp" name="old_mrp" value="{{ (isset($data_row->old_mrp))?$data_row->old_mrp:old('old_mrp') }}">
                  </div>
                </div>


                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Revised MRP</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="revised_mrp" name="revised_mrp" value="{{ (isset($data_row->revised_mrp))?$data_row->revised_mrp:old('revised_mrp') }}">
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