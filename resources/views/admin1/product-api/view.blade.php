@extends('admin.layouts.template_admin')


@section('content')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
     

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form class="form-horizontal" method="POST" action="<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>/save" enctype="multipart/form-data">
             {{ csrf_field() }}
             <input type="hidden" required="" name="id" value="{{ (isset($data_row->id))?$data_row->id:'' }}">

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="category" name="category" value="{{ (isset($data_row->category))?$data_row->category:old('category') }}">
                  </div>
                </div>



                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control get_url_name" id="product" name="product" value="{{ (isset($data_row->product))?$data_row->product:old('product') }}">
                  </div>
                </div>
                  

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Therapeutic</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="therapeutic" name="therapeutic" value="{{ (isset($data_row->therapeutic))?$data_row->therapeutic:old('therapeutic') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Manufacturing Site</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="manufacturing_site" name="manufacturing_site" value="{{ (isset($data_row->manufacturing_site))?$data_row->manufacturing_site:old('manufacturing_site') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Regulated Markets</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="regulated_markets" name="regulated_markets" value="{{ (isset($data_row->regulated_markets))?$data_row->regulated_markets:old('regulated_markets') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Emerging Markets</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="emerging_markets" name="emerging_markets" value="{{ (isset($data_row->emerging_markets))?$data_row->emerging_markets:old('emerging_markets') }}">
                  </div>
                </div>

                
             <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>        
                  <div class="col-sm-10">                       
                  <select name="status" class="form-control select" required  >          
                        @foreach ( Config::get('constants.CONS_STATUS_ARRAY')  as $key =>$val)
                            <?php 
                              $selected='';
                              if(isset($data_row['status']) && $data_row['status']==$key){
                                $selected='selected';
                              }elseif(old('status')==$key){
                                 $selected='selected';
                              } 
                            ?>
                <option value="{{ $key }}"   {{ $selected }}  >
                 {{ $val }}
                </option>
                    @endforeach 
                   </select>
                  </div>
            </div>




                <input type="hidden" name="submit_type" id="submit_type" value="1">
                <div class="box-footer pull-right">         
                <button type="submit" class="btn btn-primary" onclick="actionType(1)">Save</button>
                <button type="submit" class="btn bg-olive " onclick="actionType(2)">Save and Countinue</button>  

                  <button type="reset" class="btn btn-default ">Reset</button>
                   <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>'">Back</button>

                    <?php if(isset($data_row['id']) && $data_row['id']!=''){?>
                    <button type="submit" class="btn bg-red " onclick="actionType(3)" >Delete</button>
                    <?php } ?>
                  

              </div>



              </div>
              <!-- /.box-body -->


      </div>
      </div>
      <!-- /.row (main row) -->
</div>
    </section>









    @endsection