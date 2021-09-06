@extends('adminlte::page')

@section('content_header')
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark"> Page Blog List </h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" title="Add New" href="<?php echo Request::url();?>/new"><i class="fa fa-plus"></i> Add New</a>
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

@stop

@section('content')

@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop

@section('content')
@section('plugins.Datatables', true)
@php
use App\Models\Page;
use App\Models\WindowdoorType;
use App\Models\WindowType;
@endphp
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
{{--
 <div class="row">
              <div class="col-md-12">
                <div class="card">
            <div class="card-header">
                   <div class="row ">
                        <div class="col-md-8 "> <h3>Page Blog List ( <?php echo $data_rows->total();?> Records )</h3></div>
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
                   
                    <div class="row ">
                        <div class="col-md-8 "> <h3>Filters</h3></div>
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
                        <label>Category</label>
                        <select name="category_id" id="category_id"  class="form-control select">
                      <option value=""></option>
                          <?php foreach ($categorys as $category) { ?>
                             <option value="<?php echo $category->id;?>"  <?php echo (isset($_GET['category_id']) && $_GET['category_id']==$category->id)?'selected':'';?>><?php echo $category->name;?> 
                              </option>
                       
                        <?php } ?>
                    </select>
                      </div>  

    
                      

                     <div class="col-md-2">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo (isset($_GET['name']))?$_GET['name']:'';?>">
                      </div>  


                     <div class="col-md-2">
                        <label>Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="<?php echo (isset($_GET['slug']))?$_GET['slug']:'';?>">
                      </div>  



                     <div class="col-md-2">
                        <label>Related Page</label>
                        <select name="page" id="page"  class="form-control select">
                              <option value="">Default</option>
                            <optgroup label="Page">
                          <?php foreach ($pages as $page) { ?>
                             <option value="page-<?php echo $page->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$page->id)?'selected':'';?>><?php echo $page->page_title;?> 
                              </option>
                            <?php } ?>
                            </optgroup>
                            <optgroup label="Product">   
                                <?php foreach ($product as $pp) { ?>
                             <option value="product-<?php echo $pp->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$pp->id)?'selected':'';?>><?php echo $pp->title;?> 
                              </option>
                        <?php } ?>
                            </optgroup>
                        </select>
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



                      
                      <div class="col-md-2">
                        <label>From Date</label>
                        <input type="date" class="form-control" id="fdate" name="fdate" placeholder="From Date" value="<?php echo (isset($_GET['fdate']))?$_GET['fdate']:'';?>" min="2000-01-01" max="<?php echo date('Y-m-d');?>">
                      </div>  
                      
                       <div class="col-md-2">
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


            <!-- /.box-header -->
          --}}  
       <div class="card-body table-responsive p-0">
        <input type="hidden" class="tb" value="blog_page">
    <div class="row bulkaction"  style="margin-bottom:10px;display:none;">
    <a type="button" id="delete_records" style="color:#fff" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Bulk Delete</a>&nbsp;&nbsp;
    <a type="button" id="active_records" style="color:#fff" class="btn btn-primary pull-right"><i class="fa fa-file"></i> Bulk Active</a>&nbsp;&nbsp;
    <a type="button" id="inactive_records" style="color:#fff" class="btn btn-warning pull-right"><i class="fa fa-location-arrow"></i> Bulk Inactive</a>
    </div>
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr>
<th><input type="checkbox" id="select_all" /></th>
                  <th>ID</th>
                  <th>Page</th>                
                  <th>Name</th>                
                  {{-- <th>Slug</th> --}}                 
                  <th>Status</th>                  
                  <th>Posted Date</th>
                 {{-- <th>Posted Date</th>--}}
                  <th>Action</th>
                  
                </tr>
        </thead>
        <tbody>
              @php $er=1;
            @endphp
                @foreach ($data_rows as $i=> $data_row)
                    @php if($i<41 || $i>43){
                        if(!empty($data_row->page)){
                          $p_add = explode(',',$data_row->page);
            $p_title='';
            foreach($p_add as $pp){
            $p_ad = explode('-',$pp);
                            if($p_ad[0]=='page'){
                                $Pagesdd = Page::find($p_ad[1]);
                                $p_title.= $Pagesdd->page_title." , ";
                            }
                           else if($p_ad[0]=='product'){
                                $Pagesdddsd = WindowdoorType::find($p_ad[1]);

                                $p_title.=$Pagesdddsd->title." , ";
                            }
                           else if($p_ad[0]=='producttype'){
                                $PageADasdd = WindowType::find($p_ad[1]);
                                $p_title.= $PageADasdd->title." , ";
                            }
                            else{
                            $p_title = 'Default';
                            }
            }
                           }else{
                            $p_title = 'Default';
                            } 
                    @endphp
                <tr>
              
 <td><input type="checkbox" class="checkbox" data-emp-id="{{$data_row->id}}" value="{{$data_row->id}}"/></td>
                    
                  <td> {{ $er++ }}</td>
                 <td> @if(isset($p_title)) {{ $p_title }} @else Default @endif</td> 
                  <td> {{ $data_row->name }}</td>
                 {{-- <td>{{ $data_row->slug }}</td> --}}
                 
            <td><span class="label label-<?php echo ($data_row->status=='1')?'success':'danger';?>">
                   {{-- Config::get('constants.CONS_STATUS_ARRAY')[$data_row->status] --}}</span>{{$data_row->status}}</td>
                  <td>{{ $data_row->created_at->format('F j, Y') }}</td>
             {{--      <td>{{ $data_row->posted_date }}</td>--}}
                    
                  <td>
                  <a title="Edit " href="<?php echo Request::url();?>/view/<?php echo $data_row->id;?>" ><i class="fas fa-edit"></i></a>
                  <a href="<?php echo Request::url();?>?delete=<?php echo $data_row->id;?>" title="Delete " class="delete" onclick="return confirm('Are you sure you want to delete {{$data_row->name}}?');"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
           @php } @endphp
               @endforeach

               

              </tbody>
           </table>
            </div>    
                       
                <?php /*  <div class="container paginate">
                    <?php  if(count($search_array)){                  
                      echo $data_rows->appends($search_array)->links();
                    } else {
                      echo $data_rows->links();
                    }
                    ?>
                    </div>  */ ?>
            <!-- /.box-body -->
       


@stop
@section('js')
<script>
	jQuery(document).ready(function ($) {
		$('.data-table').dataTable();
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
             $('.bulkaction').show(); 
            
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
             $('.bulkaction').hide(); 
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length>0){
            $('.bulkaction').show(); 
        }else{
             $('.bulkaction').hide(); 
        }
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
           
        }else{
            $('#select_all').prop('checked',false);
            
        }
    });
});
    
    // delete selected records
$('#delete_records').on('click', function(e) { 
    var tt = $(".tb").val();
	var employee = [];  
	$(".checkbox:checked").each(function() {  
		employee.push($(this).data('emp-id'));
	});	
	if(employee.length <=0)  {  
		alert("Please select records.");  
	}  
	else { 	
		WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		var checked = confirm(WRN_PROFILE_DELETE);  
		if(checked == true) {			
			var selected_values = employee.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "{{url('/admin/bulk_delete_action')}}",  
				cache:false,  
				data: "emp_id="+selected_values+"&t="+tt+"&_token={{ csrf_token() }}",
				success: function(response) {	
					// remove deleted employee rows
					alert("Successfully Deleted !!");	
                    location.reload();		
				}   
			});				
		}  
	}  
});
    
    // Active selected records
$('#active_records').on('click', function(e) { 
    var tt = $(".tb").val();
	var employee = [];  
	$(".checkbox:checked").each(function() {  
		employee.push($(this).data('emp-id'));
	});	
	if(employee.length <=0)  {  
		alert("Please select records.");  
	}  
	else { 	
		WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		var checked = confirm(WRN_PROFILE_DELETE);  
		if(checked == true) {			
			var selected_values = employee.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "{{url('/admin/bulk_active_action')}}",  
				cache:false,  
				data: "emp_id="+selected_values+"&t="+tt+"&_token={{ csrf_token() }}",  
				success: function(response) {	
					alert("Successfully Activated !!");
                    location.reload();		
				}   
			});				
		}  
	}  
});
    
    // delete selected records
$('#inactive_records').on('click', function(e) { 
    var tt = $(".tb").val();
	var employee = [];  
	$(".checkbox:checked").each(function() {  
		employee.push($(this).data('emp-id'));
	});	
	if(employee.length <=0)  {  
		alert("Please select records.");  
	}  
	else { 	
		WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		var checked = confirm(WRN_PROFILE_DELETE);  
		if(checked == true) {			
			var selected_values = employee.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "{{url('/admin/bulk_inactive_action')}}",  
				cache:false,  
				data: "emp_id="+selected_values+"&t="+tt+"&_token={{ csrf_token() }}",  
				success: function(response) {	
					// remove deleted employee rows
					alert("Successfully Inactivated !!");							location.reload();			
				}   
			});				
		}  
	}  
});
</script>

@stop