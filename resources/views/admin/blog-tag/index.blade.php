@extends('adminlte::page')

@section('content')

@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop

@section('content')
@section('plugins.Datatables', true)

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
 <div class="row">
              <div class="col-md-12">
                <div class="card">
            <div class="card-header">
            <div class="row">

              <div class="col-md-8">
                <h3 >Blog Tags( <?php echo $data_rows->total();?> Records )</h3>
                </div>
                
              <div class="col-md-4 text-right">
              <a class="btn btn-primary" href="<?php echo Request::url();?>/new">Add new</a>
                  <?php
                  $search_array=array();
                  $search_url='';
                      foreach($_GET as $key => $value){
                       $search_array[$key]=$value;
                       $search_url.=$key.'='.$value.'&';
                         // echo $key . " : " . $value . "<br />\r\n";
                        }                       
                        ?>

                    <a href="<?php echo Request::url();?>/export?<?php echo $search_url;?>" class="btn btn-default">Export</a> 
              
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>



           
             <!-- field filter-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">

                   <form class="form-horizontal" method="GET" action="<?php echo Request::url();?>">
                  <input type="hidden" name="saerch" value="field">
                  <div class=" card-header ">
                        <div class="row">
                        <div class="col-md-8">
                    <h3 >Filters</h3>
                      </div>
                   
                    <div class="col-md-4 text-right"> <a href="<?php echo Request::url();?>" style="margin-right:10px;">
                      <button class="btn btn-info pull-right" type="button">Clear Filter</button>
                      </a> 
                      <button class="btn  btn-primary " type="submit">Apply Filter</button>
                    </div>
                  </div>
                  </div>

                  
                  <div class="card-body">
                    <div class="row filter-input">
                      
                      

                     <div class="col-md-2">
                        <label>Title</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Title" value="<?php echo (isset($_GET['name']))?$_GET['name']:'';?>">
                      </div>  


                      <div class="col-md-2">
                        <label>Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="<?php echo (isset($_GET['slug']))?$_GET['slug']:'';?>">
                      </div> 
                      
                       <div class="col-md-2">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control" >
                          <option  value=""></option>
                          
                    @foreach(Config::get('constants.CONS_STATUS_ARRAY') as $key=>$val):
                              
                          <option value="{{$key}}" {{ (isset($_GET['status']) && $_GET['status']==$key)?'selected="selected"':'' }} >{{$val}}</option>
                          
                    @endforeach
                            
                        </select>
                      </div>



                      
                      <div class="col-md-3">
                        <label>From Date</label>
                        <input type="date" class="form-control" id="fdate" name="fdate" placeholder="From Date" value="<?php echo (isset($_GET['fdate']))?$_GET['fdate']:'';?>" min="2000-01-01" max="<?php echo date('Y-m-d');?>">
                      </div>  
                      
                       <div class="col-md-3">
                        <label>To Date</label>
                        <input type="date" class="form-control" id="tdate" name="tdate" placeholder="From Date" value="<?php echo (isset($_GET['tdate']))?$_GET['tdate']:'';?>" min="2000-01-01" max="<?php echo date('Y-m-d');?>">
                      </div>  
                      


                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>

              <!-- end field filter-->


   <div class="card-body table-responsive p-0">
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr>
                  <th>ID</th>
                  <th>Name</th>                
                  <th>Slug</th>                  
                  <th>Status</th>                  
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                  
                </tr>
        </thead>
        <tbody>
                @foreach ($data_rows as $data_row)
                <tr>
                  <td> {{ $data_row->id }}</td>
                  <td> {{ $data_row->name }}</td>
                  <td>{{ $data_row->slug }}</td>
                 
            <td><span class="label label-<?php echo ($data_row->status=='1')?'success':'danger';?>">
                   {{ Config::get('constants.CONS_STATUS_ARRAY')[$data_row->status] }}</span></td>
                  <td>{{ $data_row->created_at->format('F j, Y') }}</td>
                   <td>{{ $data_row->updated_at->format('F j, Y') }}</td>
                    
                  <td>
                  <a href="<?php echo Request::url();?>/view/<?php echo $data_row->id;?>" class="btn bg-olive ">View</a>
                  <a href="<?php echo Request::url();?>?delete=<?php echo $data_row->id;?>" class="btn bg-red  " onclick="return confirm('Are you sure you want to delete {{$data_row->title}}?');">Delete</a>
                  </td>
                </tr>
               @endforeach

               

              </tbody></table>
            </div>    
                       
                    <div class="container paginate">
                    <?php  if(count($search_array)){                  
                      echo $data_rows->appends($search_array)->links();
                    } else {
                      echo $data_rows->links();
                    }
                    ?>
                    </div>
            <!-- /.box-body -->
        







@stop
@section('js')
<script>
	jQuery(document).ready(function ($) {
		$('.data-table').dataTable();
    });
</script>

@stop