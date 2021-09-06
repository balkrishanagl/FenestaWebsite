@extends('admin.layouts.template_admin')


@section('content')

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

              <h3 class="box-title">Total <?php echo $data_rows->total();?> records.</h3>
				<!-- <a class="btn btn-primary" href="<?php echo Request::url();?>/new">Add new</a>  -->
                    <a href="<?php echo Request::url();?>/export?<?php echo (isset($_GET['q']))?'q='.$_GET['q']:'';?>" class="btn btn-default">Export</i></a>
                
              <div class="box-tools">
               
              </div>
            </div>
            <!-- /.box-header -->



              <!-- field filter-->
            <div class="row">
              <div class="col-md-12">
                <div class="box">

                   <form class="form-horizontal" method="GET" action="<?php echo Request::url();?>">
                  <input type="hidden" name="saerch" value="field">
                  <div class=" box-header with-border">
                    <h3 class="box-title class=" filter>Filters</h3>
                    
                   
                    <div class="col-sm-2 pull-right"> <a href="<?php echo Request::url();?>" style="margin-right:10px;">
                      <button class="btn btn-info pull-right" type="button">Clear Filter</button>
                      </a> </div>

                       <div class="col-sm-1 pull-right">
                      <button class="btn  btn-primary " type="submit">Apply Filter</button>
                    </div>
                  </div>

                  
                  <div class="box-body">
                    <div class="row filter-input">
                     
                      <div class="col-xs-3">
                        <label>Page Type</label>
                        <select name="type" id="type" class="form-control" >
                          <option  value=""></option>
                          
                    @foreach(Config::get('constants.CONS_CONTACT_TYPE_ARRAY') as $key=>$val):
                              
                          <option value="{{$key}}" {{ (isset($_GET['type']) && $_GET['type']==$key)?'selected="selected"':'' }} >{{$val}}</option>
                          
                    @endforeach
                            
                        </select>
                      </div>

                     <div class="col-xs-3">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo (isset($_GET['name']))?$_GET['name']:'';?>">
                      </div>  



                      
                       <div class="col-xs-2">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control" >
                          <option  value=""></option>
                          
                    @foreach(Config::get('constants.CONS_CONTACT_STATUS_ARRAY') as $key=>$val):
                              
                          <option value="{{$key}}" {{ (isset($_GET['status']) && $_GET['status']==$key)?'selected="selected"':'' }} >{{$val}}</option>
                          
                    @endforeach
                            
                        </select>
                      </div>



                      
                      <div class="col-xs-2">
                        <label>From Date</label>
                        <input type="date" class="form-control" id="fdate" name="fdate" placeholder="From Date" value="<?php echo (isset($_GET['fdate']))?$_GET['fdate']:'';?>" min="2000-01-01" max="<?php echo date('Y-m-d');?>">
                      </div>  
                      
                       <div class="col-xs-2">
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




            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
      					<th>Name</th>                  
                <th>Email</th>  
      					<th>Mobile</th>  
              <th>Status</th>         
              <th>Page Type</th>					
                  
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                  
                </tr>
                @foreach ($data_rows as $data_row)
                <tr>
                  <td> {{ $data_row->id }}</td>
                  <td>{{ $data_row->name }}</td>
                  <td>{{ $data_row->email }}</td>
                  <td>{{ $data_row->mobile }}</td>
                  <td>{{ $data_row->status }}</td>
                  <td>{{ $data_row->page_type }}</td>
                
                  
                    <td>{{ $data_row->created_at->format('F j, Y') }}</td>
                     <td>{{ $data_row->updated_at->format('F j, Y') }}</td>
                  <td>
                  <a href="<?php echo Request::url();?>/view/<?php echo $data_row->id;?>" class="btn bg-olive ">View</a>
                  <a href="<?php echo Request::url();?>?delete=<?php echo $data_row->id;?>" class="btn bg-red  " onclick="return confirm('Are you sure you want to delete {{$data_row->name}}?');">Delete</a>
                  </td>
                </tr>
               @endforeach

               

              </tbody></table>
            </div>    
                    <div class="container paginate">
                    <?php  if(isset($_GET['q'])){
                    echo $data_rows->appends(array('q' => $_GET['q']))->links();
                    } else {
                    echo $data_rows->links();
                    }
                    ?>
                    </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>





    @endsection