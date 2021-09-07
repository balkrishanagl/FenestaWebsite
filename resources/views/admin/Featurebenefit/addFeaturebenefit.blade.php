@extends('adminlte::page')

@section('title', 'Add Feature benefits')

@section('content_header')
<h1 class="m-0 text-dark">Add Feature benefits</h1>

@stop

@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop


@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>
<script>
        
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

    $("#icon").change(function(){
        readURL(this);
    });
        
        function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag1').show();
            $('#category-img-tag1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#onhovericon").change(function(){
        readURL1(this);
    });
        
        function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag2').show();
            $('#category-img-tag2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#image").change(function(){
        readURL2(this);
    });
        
        
</script>

<script>
    jQuery(document).ready(function($)
    {
        var i=1;
        $('[data-toggle="tooltip"]').tooltip();
        $(".add-new-bg").click(function()
        {
  
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text"  name="optiondata['+i+'][title]"  class="form-control"></td><td><input type="text"  name="optiondata['+i+'][content]"  class="form-control"></td><' +
                '<td  style="cursor:pointer"  class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>' +
                '</tr>';
            $("#tablemuli-bg").append(row);    
            $('[data-toggle="tooltip"]').tooltip();
            i=i+1;
        });
        $(document).on("click", ".delete_bg", function()
        {
            $(this).parents("tr").remove();
        })
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
				{{ Form::open(array('url' => 'admin/saveFeaturebenefit','files' => true)) }}
				<div class="form-group">
					{{ Form::label('name', 'Name*') }}
					{{ Form::text('name',null,array('class'=>'form-control','placeholder' => 'Enter Name')) }}
				</div>  
                <div class="form-group">
					{{ Form::label('othername', 'Other Name*') }}
					{{ Form::text('othername',null,array('class'=>'form-control','placeholder' => 'Enter Style & benefits Name')) }}
				</div>
				<div class="form-group">
					{{ Form::label('title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', 'Description*') }}
					{{ Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Description')) }}
				</div>	<div class="form-group">
					{{ Form::label('belowimage', 'Below Image content*') }}
					{{ Form::textarea('belowimage',null,array('class'=>'form-control','placeholder' => 'Enter Below Image content')) }}
				</div>
                <div class="form-group">
                    {{ Form::label('meta_title', 'Meta Title*') }}
                            {{ Form::text('meta_title', null, array('class'=>'form-control','placeholder' => 'Meta Title')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('meta_keyword', 'Meta Keyword*') }}
                            {{ Form::text('meta_keyword', null, array('class'=>'form-control','placeholder' => 'Meta Keyword')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('meta_description', 'Meta Description*') }}
                            {{ Form::text('meta_description', null, array('class'=>'form-control','placeholder' => 'Meta Description')) }}
                        </div>
				<div class="form-group">
					{{ Form::label('result', 'Result*') }}
					{{ Form::text('result',null,array('class'=>'form-control','placeholder' => 'Enter Result')) }}
				</div>
				
                	<div class="form-group">
					{{ Form::label('belowpoints', 'Below Points Content*') }}
					{{ Form::textarea('belowpoints',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Below Points Content')) }}
				</div>
                
                <hr>
                
             <h3>Points</h3>  <hr>
                <button type="button" class="btn btn-primary add-new-bg gradientbg pull-right"><i class="fa fa-plus"></i> Add New </button>

                <table class="table" id="tablemuli-bg">
                  <thead>
                    <tr>
                        <td> Title </td>
                        <td>  Content </td>
                        <td>  </td>
                    </tr>
                  </thead>
                  <tbody>
                      
                    <tr>
                         <td><input type="text" name="optiondata[0][title]" class="form-control" ></td>
                         <td><input type="text"  name="optiondata[0][content]"  class="form-control"></td>
                        
                         <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
                
                
				<div class="form-group">
					{{ Form::label('icon', ' Icon*') }}
					{{ Form::file('icon',array('class'=>'form-control')) }} <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
				<div class="form-group">
					{{ Form::label('onhovericon', ' On Hover Icon*') }}
					{{ Form::file('onhovericon',array('class'=>'form-control')) }} <br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="200px" />
				</div>
				<div class="form-group">
					{{ Form::label('image', ' Image*') }}
					{{ Form::file('image',array('class'=>'form-control')) }} <br>
                       <img src="#" style="display:none;" id="category-img-tag2" width="200px" />
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
				{{ Form::label('showon', 'Show on style & benefits*') }}
					{{ Form::select('showon',
					array(
					'Yes' => 'Yes',
					'No' => 'No',
					),
					null,
					array(
					'class' => 'form-control'
					)
					)}}
			</div>

				<!-- <div class="custom-file mb-3">
			      <input type="file" class="custom-file-input" id="customFile" name="filename">
			      <label class="custom-file-label" for="customFile">Choose file</label>
			    </div> -->
                
                
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Window Type</th>
                                @foreach($series as $ss)
                                <th>{{$ss->title}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($windowdoortype->unique('title') as $wdt)
                        
                            <tr> 
                                <td>{{$wdt->title}}</td>
                                @foreach($series as $ss)
                                <td><select class="form-control" name="windowdata[{{$wdt->title}}][{{$ss->title}}][]">
                                    <option value="NA">NA</option>
                                    <option value="*">*</option>
                                    <option value="**">**</option>
                                    <option value="***">***</option>
                                    <option value="****">****</option>
                                    <option value="*****">*****</option>
                                    </select></td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Door Type</th>
                                @foreach($series as $ss)
                                <th>{{$ss->title}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($doortype->unique('title') as $wdt)
                            <tr> 
                                <td> {{$wdt->title}}</td>
                                @foreach($series as $ss)
                                <td><select class="form-control" name="doordata[{{$wdt->title}}][{{$ss->title}}][]">
                                    <option value="NA">NA</option>
                                    <option value="*">*</option>
                                    <option value="**">**</option>
                                    <option value="***">***</option>
                                    <option value="****">****</option>
                                    <option value="*****">*****</option>
                                    </select></td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
 <div class="form-group">
				<div class="form-group">
					{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>