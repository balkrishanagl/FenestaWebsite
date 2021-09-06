@extends('adminlte::page')

@section('title', 'Edit FAQ')

@section('content_header')
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">Edit Faq</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="{{ URL::to('/') }}/admin/listFaq"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>
@stop

@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@stop
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
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
			<div class="card-body">
				{{ Form::model($faq, ['url'  => ['admin/updateFaq', $faq->id], 'role'=> 'form','files'=>'true']) }}

				<div class="form-group">
					{{ Form::label('Question', 'Question*') }}
					{{ Form::text('title', null, array('class'=>'form-control','placeholder' => 'Enter Question')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Answer', 'Answer*') }}
					{{ Form::textarea('answer',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Answer')) }}
				</div>
                
                
				<div class="form-group">
                        <label>Related Page</label>
                       
                            @php
                            $showarray = explode(',',$faq->page);
                            $page_array = array();
                            $product_array = array();
                            $producttype_array  = array();
                            foreach($showarray as $ss){
                              if (strpos( $ss , 'page') !== FALSE) {
                                 $page_array[] = explode('-',$ss)[1];
                              }
                              if (strpos( $ss , 'product') !== FALSE) {
                                 $product_array[] = explode('-',$ss)[1];
                              }
                              if (strpos( $ss , 'producttype') !== FALSE) {
                                 $producttype_array[] = explode('-',$ss)[1];
                              }
        
                            }
                            @endphp
                            
					<select name="page[]" id="page" multiple  class="form-control js-example-basic-multiple">
                      <option value="">Default</option>
                            <optgroup label="Page">
                                <?php foreach ($pages as $page) { ?>
                             <option <?php echo (in_array($page->id,$page_array))?'selected':'';?> value="page-<?php echo $page->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$page->id)?'selected':'';?>><?php echo $page->page_title;?> 
                              </option>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Product"> 
                                
                            <?php foreach ($product as $pp) { 
                              $othertypee = $pp->producttype()->get();
                            
                            ?>
                             <option <?php echo (in_array($pp->id,$product_array))?'selected':'';?> value="product-<?php echo $pp->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$pp->id)?'selected':'';?>><?php echo $pp->title;?> 
                              </option>
                              <?php foreach ($othertypee as $ppo) { ?> 
                              <option <?php echo (in_array($ppo->id,$producttype_array))?'selected':'';?> value="producttype-<?php echo $ppo->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$ppo->id)?'selected':'';?>>  <?php echo $pp->title;?>  : <?php echo $ppo->title;?>
                              </option>
                              <?php } ?>
                              
                            <?php } ?>
                            </optgroup>
                           
                    </select>
			
                      </div> 
                 <div class="form-group">
				{{ Form::label('status', 'Status*') }}
					{{ Form::select('status',
					array(
					'Active' => 'Active',
					'Inactive' => 'Inactive',
					),
					null,
					array(
					'class' => 'form-control'
					)
					)}}
			</div>
				<div class="form-group">
					{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@stop