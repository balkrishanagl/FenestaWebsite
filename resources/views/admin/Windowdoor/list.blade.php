@extends('adminlte::page')

@section('title', 'Home Window & Door Section')

@section('content_header')
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark"> Home Window & Door List </h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" title="Add New" href="{{ URL::to('/') }}/admin/Windowdoor"><i class="fa fa-plus"></i> Add New</a>
                 
  </div>
  </div>
@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop


@section('content')

@section('plugins.Datatables', true)


@section('content')
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


<div class="card-body table-responsive p-0">
     <input type="hidden" class="tb" value="window_doors">
    <div class="row bulkaction"  style="margin-bottom:10px;display:none;">
    <a type="button" id="delete_records" style="color:#fff" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Bulk Delete</a>&nbsp;&nbsp;
    <a type="button" id="active_records" style="color:#fff" class="btn btn-primary pull-right"><i class="fa fa-file"></i> Bulk Active</a>&nbsp;&nbsp;
    <a type="button" id="inactive_records" style="color:#fff" class="btn btn-warning pull-right"><i class="fa fa-location-arrow"></i> Bulk Inactive</a>
    </div>

    
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr><th><input type="checkbox" id="select_all" /></th>
				<th>ID</th>
				<th>Title</th>
				<th>Window Image</th>
				<th>Door Image</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($banners as $banner)
			<tr><td><input type="checkbox" class="checkbox" data-emp-id="{{$banner->id}}" value="{{$banner->id}}"/></td>
				<td>{{$i}}</td>
				<td>{{$banner->heading}}</td>
				<td><img height="50px" width="50px" src={!!asset("images/windowdoor/$banner->window_image")!!}></td>
				<td><img height="50px" width="50px" src={!!asset("images/windowdoor/$banner->door_image")!!}></td><td>{{$banner->status}}</td>
				<td><a title="Edit" href="{{URL('admin/edit',['id' => $banner->id])}}"><i class="fas fa-edit"></i></a> <a title="Delete" href="javascript:void(0)" data-id = "{{$banner->id}}" class="delete"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
			<?php $i++; ?>
			@endforeach
		</tbody>

	</table>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display:initial;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
	$(document).ready(function () {
		$('.data-table').dataTable();

		$(document).on('click', '.delete', function(){
  			banner_id = $(this).attr('data-id');
  			token: 
 		 	$('#confirmModal').modal('show');
 		});

		$('#ok_button').click(function(){
  			$.ajax({
   				url:"delete/"+banner_id,
   				beforeSend:function(){
    				$('#ok_button').text('Deleting...');
   				},
   				success:function(data)
   				{
   					
   					var output = JSON.parse(data);
   					if(output.key == '1'){
   						
		    			setTimeout(function(){
		     				$('#confirmModal').modal('hide');
		     				location.reload();
		     				alert(output.msg);
	    				}, 2000);
	    			}else{
	    				alert(output.msg);
	    			}
   				}
  			})
 		});
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