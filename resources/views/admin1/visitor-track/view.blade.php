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
                    <div class="col-sm-2">VisitorID</div>
                    <div class="col-sm-10"><b>{{ $data_row->visitor }}</b></div>
                </div>

                <div class="form-group">                  
                    <div class="col-sm-2">IP</div>
                    <div class="col-sm-10"><b>{{ $data_row->ip }}</b></div>
                </div>

                <div class="form-group">                  
                    <div class="col-sm-2">Country</div>
                    <div class="col-sm-10"><b>{{ $data_row->country }}</b></div>
                </div>

                <div class="form-group">                  
                    <div class="col-sm-2">Region</div>
                    <div class="col-sm-10"><b>{{ $data_row->regionName }}</b></div>
                </div>
                <div class="form-group">                  
                    <div class="col-sm-2">City</div>
                    <div class="col-sm-10"><b>{{ $data_row->city }}</b></div>
                </div>

                <div class="form-group">                  
                    <div class="col-sm-2">UseTime</div>
                    <div class="col-sm-10"><b>{{ $data_row->use_time }}</b></div>
                </div>
                <div class="form-group">                  
                    <div class="col-sm-2">Device</div>
                    <div class="col-sm-10"><b>{{ $data_row->device }}</b></div>
                </div>
                <div class="form-group">                  
                    <div class="col-sm-2">Visited Pages</div>
                    <div class="col-sm-10"><b>{{ $data_row->pages }}</b></div>
                </div>
                <div class="form-group">                  
                    <div class="col-sm-2">First Hit Date</div>
                    <div class="col-sm-10"><b>{{ $data_row->created_at->format('F j, Y h:i:s') }}</b></div>
                </div>

                 <div class="form-group">                  
                    <div class="col-sm-2">Last Hit Date</div>
                    <div class="col-sm-10"><b>{{ $data_row->updated_at->format('F j, Y h:i:s') }}</b></div>
                </div>
                







               



              </div>
              <!-- /.box-body -->


      </div>
      </div>
      <!-- /.row (main row) -->
</div>
    </section>









    @endsection