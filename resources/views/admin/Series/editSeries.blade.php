@extends('adminlte::page')

@section('title', 'Edit Series')

@section('content_header')
<h1 class="m-0 text-dark">Edit Series</h1>

@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>
<script>
      $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});  
             function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag').show();
            $('#category-img-tag').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
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
				{{ Form::model($news, ['url'  => ['admin/updateSeries', $news->id], 'role'=> 'form','files'=>'true']) }}
				

				<div class="form-group">
					{{ Form::label('title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
			
			<div class="form-group">
					{{ Form::label('image', 'Image* (Leave Blank if not want to edit)') }}
					<input type="file" class="form-control" name="image" id="image" >
                <br>
                    @if($news->image)
                       <img src="{{asset("images/series/$news->image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
                
				</div>
			<div class="form-group">
				{{ Form::label('description', 'Content*') }}
				{{ Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Content')) }}
			</div>
			<div class="form-group">
				{{ Form::label('feature', 'Feature*') }}
				{{ Form::textarea('feature',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Feature')) }}
			</div>
                
                                            @php
                            $showarray = explode(',',$news->product);
                           
                            @endphp
                
                
                  <div class="form-group">
					{{ Form::label('product_ids', 'Product*') }}
                            
					<select name="product_ids[]" id="product_ids" multiple  class="form-control js-example-basic-multiple">
                      <option value="">Default</option>
                            
                            <optgroup label="Product"> 
                                
                            <?php foreach ($product as $pp) { 
                              $othertypee = $pp->producttype()->get();
                            
                            ?>
                            
                              <?php foreach ($othertypee as $ppo) { ?> 
                              <option <?php echo (in_array($ppo->id,$showarray))?'selected':'';?> value="<?php echo $ppo->id;?>" >  <?php echo $pp->title;?>  : <?php echo $ppo->title;?>
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
			{{ Form::close() }}
		</div>
	</div>
</div>
</div>
@stop

