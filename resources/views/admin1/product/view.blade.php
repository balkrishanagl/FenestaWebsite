@extends('admin.layouts.template_admin')


@section('content')
<?php
use App\ProductCategoryModel;
use App\ProductAreaModel;
?>
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control get_url_name" id="name" name="name" value="{{ (isset($data_row->name))?$data_row->name:old('name') }}">
                  </div>
                </div>
                    
                    <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Code</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="code" name="code" value="{{ (isset($data_row->code))?$data_row->code:old('code') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control put_url_key" id="slug" name="slug" value="{{ (isset($data_row->slug))?$data_row->slug:old('slug') }}">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Category</label>        
                  <div class="col-sm-10"> 

                    <?php
                     $category_id_ids_array=array();
        if(isset($data_row['category_id'])){
          $category_id_ids_array=explode(',',$data_row['category_id']);        
        }  

        ?>

                <select name="category_id[]" class="form-control select select2" multiple="" required >
        
                           <option value=""></option>
                           <?php foreach ($categorys as $key => $category) { ?>
                             <option value="<?php echo $category->id;?>"  <?php echo (in_array($category->id,$category_id_ids_array))?'selected':'';?>>
                              <?php 
                              if($category->parent_id!=''){                              
                                echo ProductCategoryModel::where('id', $category->parent_id)->first()->name.'-> ';                          

                              }

                              echo $category->name;?> </option>
                       
                        <?php } ?>
                   </select>
                  </div>
            </div>



                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Short Description</label>

                  <div class="col-sm-10">
                  <textarea class="form-control " id="short_description" name="short_description">{{ (isset($data_row->short_description))?$data_row->short_description:old('short_description') }}</textarea>       


                  </div>
                </div>

              




                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Main Image</label>
                  <div class="col-sm-10">
          <?php if(isset($data_row['image']) && $data_row['image']!=''){?>
                    <img src="{{ URL::asset('public') }}/<?php echo $data_row['image'];?>" height="100px">
          <br/> Delete <input type="checkbox" name="image_delete" value="1">
          <?php } ?>
           <input type="file" name="image" id="image" accept="image/jpeg,image/gif,image/x-png">
         <p class="help-block">Image Size :700 X 370 </p>
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




         

         <!--  <div class="box-header with-border">
              <h3 class="box-title">Product Detail</h3>
            </div>

      
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Features and Benefits</label>

                  <div class="col-sm-10">
                  <textarea class="form-control summernote" id="features_benefits" name="features_benefits">{{ (isset($data_row->features_benefits))?$data_row->features_benefits:old('features_benefits') }}</textarea>       


                  </div>
                </div>


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Specifications</label>

                  <div class="col-sm-10">
                  <textarea class="form-control summernote" id="specifications" name="specifications">{{ (isset($data_row->specifications))?$data_row->specifications:old('specifications') }}</textarea>       


                  </div>
                </div>


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Accessories Controls</label>

                  <div class="col-sm-10">
                  <textarea class="form-control summernote" id="accessories_controls" name="accessories_controls">{{ (isset($data_row->accessories_controls))?$data_row->accessories_controls:old('accessories_controls') }}</textarea>       


                  </div>
                </div>


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Electrical and Pckaging</label>

                  <div class="col-sm-10">
                  <textarea class="form-control summernote" id="electrical_packaging" name="electrical_packaging">{{ (isset($data_row->electrical_packaging))?$data_row->electrical_packaging:old('electrical_packaging') }}</textarea>       


                  </div>
                </div>


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Installation</label>

                  <div class="col-sm-10">
                  <textarea class="form-control summernote" id="installation" name="installation">{{ (isset($data_row->installation))?$data_row->installation:old('installation') }}</textarea>       


                  </div>
                </div> -->


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Download PDF</label>
                  <div class="col-sm-10">
          <?php if(isset($data_row['downloads']) && $data_row['downloads']!=''){?>
                    
                    <a href="{{ URL::asset('public/') }}/{{  $data_row->downloads }}" download="" class="know-link">Download Brochure</a>
          <br/> Delete <input type="checkbox" name="downloads_delete" value="1">
          <?php } ?>
          <input type="file" name="downloads" id="downloads" accept=".pdf">
                  </div>
                </div>
                 





<div class="box-header with-border">
              <h3 class="box-title">Meta Detail</h3>
            </div>


              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Page Title</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="page_title" name="page_title" value="{{ (isset($data_row->page_title))?$data_row->page_title:old('page_title') }}">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Keywords</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"  value="{{ (isset($data_row->meta_keywords))?$data_row->meta_keywords:old('meta_keywords') }}">
                  </div>
                </div>
                

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="meta_description" name="meta_description"  value="{{ (isset($data_row->meta_description))?$data_row->meta_description:old('meta_description') }}">
                  </div>
                </div>


            <div class="box-header with-border">
              <h3 class="box-title">Relevant Product</h3>
            </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Relevant Product List</label>
                  <div class="col-sm-10">                   
        <select name="relevant_product[]" class="form-control select select2" multiple style="height:200px;">
        <?php
          $relevant_product_ids_array=array();
        if(isset($data_row['relevant_product'])){
          $relevant_product_ids_array=explode(',',$data_row['relevant_product']);        
        }       
         foreach($relevant_products as $relevant_product){  ?>
            <option value="<?php echo $relevant_product['id'];?>" <?php echo (in_array($relevant_product['id'],$relevant_product_ids_array))?'selected':'';?>><?php echo $relevant_product['name'];?></option>
          <?php } ?>
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


<!-- gallery image-->


<?php if(isset($data_row->id)){?>
<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
     

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Gallery/Video</b></h3>
            </div>

            <div class="box-header with-border">
               <h3 class="box-title">Total <?php echo count($ProductGallery_rows);?> records.</h3>
              <a class="btn btn-primary" href="<?php echo url(ADMIN_FOLDER);?>/product-gallery/new/{{ $data_row->id }}">Add new</a>
            </div>


            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Title</th>                
                  <th>Image</th>                
                  <th>Sorting</th>                
                  <th>Video</th>              
                     
                  <th>Status</th>                  
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                  
                </tr>
                @foreach ($ProductGallery_rows as $data_row)
                <tr>
                  <td> {{ $data_row->id }}</td>
                  <td> {{ $data_row->title }}</td>

                  <td> <?php if($data_row['image_path']){?>
                    <img src="{{ URL::asset('public') }}/<?php echo $data_row['image_path'];?>" height="100px">
                    <?php } ?>
                  
                  </td>
                 
              
                  
                  <td> {{ $data_row->sorting }}</td>
                  <td> {{ $data_row->type }}</td>
                      <td><span class="label label-<?php echo ($data_row->status=='1')?'success':'danger';?>">
                   {{ Config::get('constants.CONS_STATUS_ARRAY')[$data_row->status] }}</span></td>
                  <td>{{ $data_row->created_at->format('F j, Y') }}</td>
                   
                   <td>{{ $data_row->updated_at->format('F j, Y') }}</td>
                    
                  <td>
                  <a href="<?php echo url(ADMIN_FOLDER);?>/product-gallery/view/<?php echo $data_row->id;?>" class="btn bg-olive ">View</a>
                  <a href="<?php echo url(ADMIN_FOLDER);?>/product-gallery?delete=<?php echo $data_row->id;?>" class="btn bg-red  " onclick="return confirm('Are you sure you want to delete {{$data_row->title}}?');">Delete</a>
                  </td>
                </tr>
               @endforeach

               

              </tbody></table>
            </div>    
          </div>
        </div>
      </div>
    </section>

<?php } ?>





    @endsection