@extends('adminlte::page')


@section('title', 'Comment')

@section('content_header')
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">Comment Details</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="{{ URL::to('/') }}/admin/blog-comment"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>
@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>

@stop
@section('content')

      <div class="row">
     

        <div class="col-md-12">
            
		<div class="card">

          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
               
              <div class="card-body">
        <form class="form-horizontal" method="POST" action="<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>/save" enctype="multipart/form-data">
             {{ csrf_field() }}
             <input type="hidden" required="" name="id" value="<?php echo isset($data_row['id'])?$data_row['id']:'';?>">

              <div class="box-body">


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Blog</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" readonly="" id="blog_name1" name="blog_name1" value="<?php echo isset($data_row['blog_name'])?$data_row['blog_name']:'';?>">
                  </div>
                </div>

			          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="name" name="name" value="<?php echo isset($data_row['name'])?$data_row['name']:'';?>">
                  </div>
                </div>				
				
			         	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="email" name="email" value="<?php echo isset($data_row['email'])?$data_row['email']:'';?>">
                  </div>
                </div>
  				
  					

				 
				  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Message</label>

                  <div class="col-sm-10">
						<textarea class="form-control" id="message" name="message" ><?php echo isset($data_row['message'])?$data_row['message']:'';?></textarea> 
            


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
                <button type="submit" class="btn btn-primary">submit</button>
               {{-- <button type="submit" class="btn bg-olive " onclick="actionType(2)">Save and Countinue</button>  

                  <button type="reset" class="btn btn-default ">Reset</button>
                   <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>'">Back</button>

                    <?php if(isset($data_row['id']) && $data_row['id']!=''){?>
                    <button type="submit" class="btn bg-red " onclick="actionType(3)" >Delete</button>
                    <?php } ?>
                  --}}

              </div>



              </div>
              <!-- /.box-body -->
                  </form>
              </div>
            </div>

      </div>
      </div>
      <!-- /.row (main row) -->
</div>







    @endsection