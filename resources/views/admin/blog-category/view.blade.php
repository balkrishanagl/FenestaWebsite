@extends('adminlte::page')


@section('title', 'Add Blog Category')

@section('content_header')
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">{{$title}}</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="{{ URL::to('/') }}/admin/blog-category"><i class="fa fa-arrow-left"></i> Back</a>
                 
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
             <input type="hidden" required="" name="id" value="{{ (isset($data_row->id))?$data_row->id:'' }}">

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control get_url_name" id="name" name="name" value="{{ (isset($data_row->name))?$data_row->name:old('name') }}">
                  </div>
                </div>
                  

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control put_url_key" id="slug" name="slug" value="{{ (isset($data_row->slug))?$data_row->slug:old('slug') }}">
                  </div>
                </div>



                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
          <?php if(isset($data_row['image']) && $data_row['image']!=''){?>
                    <img src="{{ URL::asset('/images/blogcategory') }}/<?php echo $data_row['image'];?>" height="100px">
          <br/> Delete <input type="checkbox" name="image_delete" value="1">
          <?php } ?>
           <input type="file" name="image" id="image" accept="image/jpeg,image/gif,image/x-png">
        
                  </div>
                </div>
                  
               
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hover Image</label>
                  <div class="col-sm-10">
          <?php if(isset($data_row['hoverimage']) && $data_row['hoverimage']!=''){?>
                    <img src="{{ URL::asset('/images/blogcategory') }}/<?php echo $data_row['hoverimage'];?>" height="100px">
          <br/> Delete <input type="checkbox" name="image_delete1" value="1">
          <?php } ?>
           <input type="file" name="hoverimage" id="hoverimage" accept="image/jpeg,image/gif,image/x-png">
        
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
            

             <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sorting</label>

                  <div class="col-sm-10">
                    <input type="number" required="" class="form-control" id="sorting" name="sorting"  value="{{ (isset($data_row->sorting))?$data_row->sorting:'1' }}">
                  </div>
                </div>


               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Page Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="page_title" name="page_title"  value="{{ (isset($data_row->page_title))?$data_row->page_title:old('page_title') }}">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Keywords</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"  value="{{ (isset($data_row->meta_keywords))?$data_row->meta_keywords:old('meta_keywords') }}">
                  </div>
                </div>
                

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="meta_description" name="meta_description"  value="{{ (isset($data_row->meta_description))?$data_row->meta_description:old('meta_description') }}">
                  </div>
                </div>


                <input type="hidden" name="submit_type" id="submit_type" value="1">
                <div class="box-footer pull-right">         
                <button type="submit" class="btn btn-primary" >submit</button>
               {{-- <button type="submit" class="btn bg-olive " onclick="actionType(2)">Save and Countinue</button>  

                  <button type="reset" class="btn btn-default ">Reset</button>
                   {{-- <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>'">Back</button>
                    
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