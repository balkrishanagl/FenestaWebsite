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
                   <div class="row ">
                        <div class="col-md-8 "> <h3>Site Visiter List : {{ $visters_total }} </h3></div>
                <div class="col-md-4 text-right">
            
                    <a href="<?php echo Request::url();?>/export" class="btn btn-default">Export</a> 
              
            </div>
            </div>
            </div>
                  </div>
     </div>
     </div>



            <!-- /.box-header -->
            
       <div class="card-body table-responsive p-0">
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr>
              <th>IP</th>
              <th>Cookie</th>
              <th>OS - Browser</th>
            {{--  <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th> --}}
              <th>State - City</th>
              <th>Last Visited Url</th>
              <th>First - Last Visit On</th>
              <th>Action</th>
                  
                </tr>
        </thead>
        <tbody>
                @foreach ($visters as $journey)
                    @php
                    $informationData = json_decode($journey->json_data, true); 
                    @endphp
                                  <tr id="row_<?php echo $journey->id; ?>">
                                      <td><?php echo $journey->ip; ?></td>
                                      <td><?php echo $journey->cookie_name; ?></td>
                                    
                                      <td><?php echo $journey->os; ?> - <?php echo $journey->browser; ?></td>
                                   
                                      
                                   {{--   <td><?php if(isset($informationData['user_information']['user_name'])){ echo $informationData['user_information']['user_name']; }?></td>
                                      <td><?php if(isset($informationData['user_information']['user_email'])){ echo $informationData['user_information']['user_email']; }?></td>
                                      <td><?php if(isset($informationData['user_information']['user_phone'])){ echo $informationData['user_information']['user_phone']; }?></td> --}}
                                      <td><?php if(isset($informationData['user_information']['state'])){ echo $informationData['user_information']['state']; }?> - <?php if(isset($informationData['user_information']['city'])){ echo $informationData['user_information']['city']; }?></td>
                                         <td><?php if(isset($informationData['last_page_info']['url'])){ echo $informationData['last_page_info']['url']; }?></td>
								                      <td><?php echo date("d F, Y,  h:i A",strtotime($journey->created_on)); ?> - <?php if($journey->updated_on !=""){ echo date("d F, Y,  h:i A",strtotime($journey->updated_on)); } ?></td>
                                      <td >
                                       <a href="<?php echo Request::url();?>/detail/<?php echo $journey->id;?> " title="View Details"><i class="fa fa-eye"></i></a> &emsp;
                                                                                
                                      </td>
                </tr>
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
		$('.data-table').DataTable({ 'order':[],
            'columnDefs': [{
                "targets": 0,
                "orderable": false
            }],
        columnDefs: [ { goals: [12]  }]  });  
    });
</script>

@stop