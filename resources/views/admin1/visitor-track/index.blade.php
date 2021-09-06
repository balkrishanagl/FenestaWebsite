@extends('admin.layouts.template_admin')


@section('content')

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

                <h3 class="box-title">Total <?php echo $data_rows->total();?> records.</h3>
             <!--  <a class="btn btn-primary" href="<?php echo Request::url();?>/new">Add new</a> -->
                  <?php
                  $search_array=array();
                  $search_url='';
                      foreach($_GET as $key => $value){
                       $search_array[$key]=$value;
                       $search_url.=$key.'='.$value.'&';
                         // echo $key . " : " . $value . "<br />\r\n";
                        }                       
                        ?>

                    <a href="<?php echo Request::url();?>/export?<?php echo $search_url;?>" class="btn btn-default">Export</i></a> 
              
            </div>



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
                     
                      <div class="col-xs-2">
                        <label>IP</label>
                        <input type="text" class="form-control" id="ip" name="ip" placeholder="IP" value="<?php echo (isset($_GET['ip']))?$_GET['ip']:'';?>">
                      </div>  

                       <div class="col-xs-2">
                        <label>Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo (isset($_GET['country']))?$_GET['country']:'';?>">
                      </div> 

                       <div class="col-xs-2">
                        <label>Region</label>
                        <input type="text" class="form-control" id="regionName" name="regionName" placeholder="Region" value="<?php echo (isset($_GET['regionName']))?$_GET['regionName']:'';?>">
                      </div> 

                       <div class="col-xs-2">
                        <label>City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Region" value="<?php echo (isset($_GET['city']))?$_GET['city']:'';?>">
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






            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>VisitorID</th>                
                  <th>IP</th>
                  <th>Country</th>
                  <th>Region</th>
                  <th>City</th>
                  <th>Use Time</th>
                  <th>Date</th>
                  <th>Action</th>
                  
                </tr>
                @foreach ($data_rows as $data_row)
                <tr>
                  <td> {{ $data_row->id }}</td>
                  <td> {{ $data_row->visitor }}</td>
                  <td> {{ $data_row->ip }}</td>                 
                  <td> {{ $data_row->country }}</td>                 
                  <td> {{ $data_row->regionName }}</td>                 
                  <td> {{ $data_row->city }}</td>                 
                  <td> {{ $data_row->use_time }}</td>                  
                  <td>{{ $data_row->created_at->format('F j, Y h:i:s') }}</td>
                   <!-- <td>{{ $data_row->updated_at->format('F j, Y') }}</td> -->
                    
                  <td>
                  <a href="<?php echo Request::url();?>/view/<?php echo $data_row->id;?>" class="btn bg-olive ">View</a>
                  <a href="<?php echo Request::url();?>?delete=<?php echo $data_row->id;?>" class="btn bg-red  " onclick="return confirm('Are you sure you want to delete {{$data_row->name}}?');">Delete</a>
                  </td>
                </tr>
               @endforeach

               

              </tbody></table>
            </div>    
                       
                    <div class="container paginate">
                    <?php  if(count($search_array)){                  
                      echo $data_rows->appends($search_array)->links();
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