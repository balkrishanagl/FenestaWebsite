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
 @php
  $informationData = json_decode($user_journey->json_data, true); 
$array_i = $informationData['pages'];
$keyf = 'count';
$tsum = array_sum(array_column($array_i,$keyf));
 @endphp
 <div class="row">
              <div class="col-md-12">
                <div class="card">
            <div class="card-header">
                   <div class="row ">
                        <div class="col-md-8 "> <h3>User Journey Detail </h3>
                            <p><b>Last Visited Url : </b> {{ $informationData['last_page_info']['url'] }}  , <b>Total Visit </b>: {{ $tsum }} </p> 
                            <p><b>State</b>  : {{ $informationData['user_information']['state'] }}  , <b>City </b>  : {{ $informationData['user_information']['city'] }}  , <b>County</b>   : {{ $informationData['user_information']['country'] }}  , <b> Pincode </b>  : {{ $informationData['user_information']['pincode'] }} </p>   
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
              <th>Page</th>
              <th>URL</th>
              <th>View</th>
              <th>Search Term</th>
              {{-- <th>Form_1</th>
              <th>Form_1 Name</th>
              <th>Form_1 Email</th>
              <th>Form_1 Phone</th>
              <th>Form_2</th>
              <th>Form_2 Name</th>
              <th>Form_2 Email</th>
              <th>Form_2 Phone</th>
              <th>Form_3</th>
              <th>Form_3 Name</th>
              <th>Form_3 Email</th>
              <th>Form_3 Phone</th> --}}
                  
                </tr>
        </thead>
        <tbody>
                
                      @foreach($informationData['pages'] as $key => $value) 
                                  <tr id="row_<?php echo $user_journey->id; ?>">
                                      <td><?php echo $user_journey->ip; ?></td>
                                      <td><?php if($value['slug'] !=''){ echo $value['slug']; }else{ echo 'Home Page'; }?></td>
                                      <td><?php echo $value['current_url'];?></td>
                                      <td><?php echo $value['count']; ?></td>
                                    <td><?php echo $value['search_term']; ?></td>
                                  {{--    <td><?php if(isset($value['form_1']['form_name'])){ echo $value['form_1']['form_name']; }?></td>
                                      <td><?php if(isset($value['form_1']['user_name'])){ echo $value['form_1']['user_name']; }?></td>
                                      <td><?php if(isset($value['form_1']['user_email'])){ echo $value['form_1']['user_email']; }?></td>
                                      <td><?php if(isset($value['form_1']['user_phone'])){ echo $value['form_1']['user_phone']; }?></td>
                                      <td><?php if(isset($value['form_2']['form_name'])){ echo $value['form_2']['form_name']; }?></td>
                                      <td><?php if(isset($value['form_2']['user_name'])){ echo $value['form_2']['user_name']; }?></td>
                                      <td><?php if(isset($value['form_2']['user_email'])){ echo $value['form_2']['user_email']; }?></td>
                                      <td><?php if(isset($value['form_2']['user_phone'])){ echo $value['form_2']['user_phone']; }?></td>
                                      <td><?php if(isset($value['form_3']['form_name'])){ echo $value['form_3']['form_name']; }?></td>
                                      <td><?php if(isset($value['form_3']['user_name'])){ echo $value['form_3']['user_name']; }?></td>
                                      <td><?php if(isset($value['form_3']['user_email'])){ echo $value['form_3']['user_email']; }?></td>
                                      <td><?php if(isset($value['form_3']['user_phone'])){ echo $value['form_3']['user_phone']; }?></td> --}}
                                  </tr>
                      @endforeach

              </tbody>
           </table>
            </div>    
                       
             


@stop
@section('js')
<script>
	jQuery(document).ready(function ($) {
		$('.data-table').DataTable({ columnDefs: [ { goals: [12]  }]  });  
    });
</script>

@stop