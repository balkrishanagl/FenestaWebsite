@extends('adminlte::page')

@section('title', ' Request a Brouchure List')

@section('content_header')
<h1 class="m-0 text-dark"> Request a Brouchure List</h1>
@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<style>
    .page-div {
    /* text-align: right; */
    margin-top: 10px;
    float: right;
}
</style>
@stop


@section('content')
{{--
@section('plugins.Datatables', true) --}}


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
    <input type="hidden" class="tb" value="enquiries">
    <div class="row bulkaction"  style="margin-bottom:10px;display:none;">
    <a type="button" id="delete_records" style="color:#fff" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Bulk Delete</a>&nbsp;&nbsp;
    </div>
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr><th><input type="checkbox" id="select_all" /></th>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Brouchure</th>
				<th>Date</th>
				<th>IP</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($newsletters as $fenestaWorlds)
			<tr><td><input type="checkbox" class="checkbox" data-emp-id="{{$fenestaWorlds->id}}" value="{{$fenestaWorlds->id}}"/></td>
				<td>{{$i}}</td>
				<td>{{$fenestaWorlds->name}}</td>
				<td>{{$fenestaWorlds->email}}</td>
				<td>{{$fenestaWorlds->contactno}}</td>
				<td>{{$fenestaWorlds->btitle}}</td>
				<td>{{ date("d, M Y",strtotime($fenestaWorlds->created_at)) }}</td>
                <td>{{$fenestaWorlds->ip}}</td>
				<td><a  title="Delete" href="#" data-id = "{{$fenestaWorlds->id}}" class="delete"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
			<?php $i++; ?>
			@endforeach
		</tbody>

	</table>
    <div class="page-div">
{{$newsletters->links("pagination::bootstrap-4")}}
    </div>
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
//		$('.data-table').dataTable();

		$(document).on('click', '.delete', function(){
  			fenestaWorld_id = $(this).attr('data-id');
  			token: 
 		 	$('#confirmModal').modal('show');
 		});

		$('#ok_button').click(function(){
  			$.ajax({
   				url:"deleteenquiries/"+fenestaWorld_id,
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
    
</script>
@stop