@extends('adminlte::page')

@section('title', 'List Blog')

@section('content_header')
<h1 class="m-0 text-dark">List Blog</h1>
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
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Blog Title</th>
				<th>Blog Content</th>
				<th>Created at</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($data_rows as $blog)
			<tr>
				<td>{{$i}}</td>
				<td>{{$blog->blog_title}}</td>
				<td>{{$blog->blog_content}}</td>
				<td>{{$blog->created_at}}</td>
				<td><a href="{{URL('admin/editBlog',['id' => $blog->id])}}"><i class="fas fa-edit"></i></a> <a href="#" data-id = "{{$blog->id}}" class="delete"><i class="fas fa-trash-alt"></i></a></td>
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
  			blog_id = $(this).attr('data-id');
  			token: 
 		 	$('#confirmModal').modal('show');
 		});

		$('#ok_button').click(function(){
  			$.ajax({
   				url:"deleteBlog/"+blog_id,
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
@stop