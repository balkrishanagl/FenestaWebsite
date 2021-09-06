@extends('admin.layouts.template_admin')


@section('content')

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

                <h3 class="box-title">Total <?php echo $data_rows->total();?> records.</h3>
              <a class="btn btn-primary" href="<?php echo Request::url();?>/new">Add new</a>
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
                      <?php /* 
                      <div class="col-xs-4">
                        <label>Domain Name</label>
                        <select name="domain_name" id="domain_name"  class="form-control select select2">
                      <option value=""></option>
                          <?php foreach ($domain_names as $domain_name_data) { ?>
                             <option value="<?php echo $domain_name_data->id;?>"  <?php echo (isset($_GET['domain_name']) && $_GET['domain_name']==$domain_name_data->id)?'selected':'';?>><?php echo $domain_name_data->domain_name;?> 
                              </option>
                       
                        <?php } ?>
                    </select>
                      </div>  

     */ ?>
                      
                      <div class="col-xs-2">
                        <label>Brand name</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="" value="<?php echo (isset($_GET['brand_name']))?$_GET['brand_name']:'';?>">
                      </div>

                     <div class="col-xs-2">
                        <label>Form name</label>
                        <input type="text" class="form-control" id="form_name" name="form_name" placeholder="" value="<?php echo (isset($_GET['form_name']))?$_GET['form_name']:'';?>">
                      </div>  

                      

                      

                      <!--div class="col-xs-2">
                        <label>Category</label>
                        <select name="category_id" id="category_id"  class="form-control select select2">
                      <option value=""></option>
                          <?php foreach ($categorys as $category) { ?>
                             <option value="<?php echo $category->id;?>"  <?php echo (isset($_GET['category_id']) && $_GET['category_id']==$category->id)?'selected':'';?>><?php echo $category->cat_name;?> 
                              </option>
                       
                        <?php } ?>
                    </select>
                      </div--> 

                      <div class="col-xs-2">
                        <label>Status</label>                


                     <select name="status" class="form-control select"   >  
                      <option value=""></option>        
                        @foreach ( Config::get('constants.CONS_STATUS_ARRAY')  as $key =>$val)
                            <?php 
                              $selected='';
                              if(isset($_GET['status']) && $_GET['status']==$key){
                                $selected='selected';
                              }
                            ?>
                <option value="{{ $key }}"   {{ $selected }}  >
                 {{ $val }}
                </option>
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






            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Brand</th>               
                  <th>Form name</th>               
                           
                  <th>Packdetails</th>                  
                  <!-- <th>Category</th>   -->                
                                   
                  <th>Status</th>                  
                  <th>Created At</th>
                 
                  <th>Action</th>
                  
                </tr>
                @foreach ($data_rows as $data_row)
                <tr>
                  <td> {{ $data_row->id }}</td>
                  <td> {{ $data_row->brand_name }}</td>
                  <td> {{ $data_row->form_name }}</td>              
                  <td>{{ $data_row->packdetails }}</td>
                   

                                      <?php /* <td> {{ App\ProductCategoryModel::find($data_row->category_id)->cat_name }}</td> */?>
                 
                  <td><span class="label label-<?php echo ($data_row->status=='1')?'success':'danger';?>">
                  <?php if(isset(Config::get('constants.CONS_STATUS_ARRAY')[$data_row->status])){

                   echo  Config::get('constants.CONS_STATUS_ARRAY')[$data_row->status];

                  }
                  ?>

                 </span></td>
                  <td>{{ $data_row->created_at->format('F j, Y') }}</td>
                  
                    
                  <td>
                  <a href="<?php echo Request::url();?>/view/<?php echo $data_row->id;?>" class="btn bg-olive ">View</a>
                  <a href="<?php echo Request::url();?>?delete=<?php echo $data_row->id;?>" class="btn bg-red  " onclick="return confirm('Are you sure you want to delete {{$data_row->active_ingredient}}?');">Delete</a>
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