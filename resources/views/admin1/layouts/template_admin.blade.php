

<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$title}} - Mankind Admin</title>
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 --> 
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="{{ URL::asset('assets/admin') }}/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


 <!-- header -->


  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo url(ADMIN_FOLDER);?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MP</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Mankind Admin</span>
    </a> 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
         
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Auth::user()->name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php echo Auth::user()->name;?> (<?php echo Auth::user()->email;?>)
                  <small>Member since <?php echo Auth::user()->created_at->format('j F, Y');?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 <a href="<?php echo ADMIN_URL;?>/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="javascript:void(0)" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>


                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

 <!-- end header -->




 <!-- sidebar start -->

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo Auth::user()->name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     

<?php

  $admin_modules_array=explode(',',Auth::user()->admin_modules);
   

?>
  

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
 
         <li class="<?php echo ($page_name=='dashboard')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/dashboard"><i class="fa fa-circle-o"></i> <span>Dashboard</span></a></li>

@if(in_array('cms-page',$admin_modules_array) || in_array('cms-block',$admin_modules_array)  || in_array('cms-banner',$admin_modules_array)  || in_array('faq',$admin_modules_array)  ||  in_array('all-modules',$admin_modules_array))

      <li class="<?php  echo   (in_array($page_name,array('cms-page','cms-block','cms-banner','faq','testimonial','newsletter','social-walls')))?'active':'';?>  treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>General</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
 @if(in_array('cms-page',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
    <li class="<?php echo ($page_name=='cms-page')?'active':''?>">
        <a href="<?php echo ADMIN_URL;?>/cms-page"><i class="fa fa-circle-o"></i>
         <span>CMS Page</span></a>
    </li>
 @endif


 @if(in_array('cms-block',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
          <li class="<?php echo ($page_name=='cms-block')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/cms-block"><i class="fa fa-circle-o"></i> <span>CMS Block</span></a></li>
   @endif

 @if(in_array('cms-banner',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
          <li class="<?php echo ($page_name=='cms-banner')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/cms-banner"><i class="fa fa-circle-o"></i> <span>CMS Image/Slider</span></a></li>
   @endif


         
  @if(in_array('faq',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
            <li class="<?php echo ($page_name=='faq')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/faq"><i class="fa fa-circle-o"></i><span>FAQs</span></a></li>
   @endif 

  

          </ul>
        </li> 
   @endif

     @if(in_array('product-prescription',$admin_modules_array) || in_array('product-category',$admin_modules_array) ||   in_array('product-prescription',$admin_modules_array)  ||   in_array('product-veterinary',$admin_modules_array)  ||   in_array('product-api',$admin_modules_array)  ||   in_array('product-international',$admin_modules_array) ||   in_array('all-modules',$admin_modules_array)) 
        
         <li class="<?php echo ($page_name=='product-category' || $page_name=='product' || $page_name=='product-international' || $page_name=='product-api' || $page_name=='product-veterinary' || $page_name=='product-prescription')?'active':''?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  @if(in_array('product-prescription',$admin_modules_array) || in_array('all-modules',$admin_modules_array))           
            <li class="<?php echo ($page_name=='product-prescription')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/product-prescription"><i class="fa fa-circle-o"></i> <span>Products Prescription</span></a></li>
  @endif  

  @if(in_array('product-veterinary',$admin_modules_array) || in_array('all-modules',$admin_modules_array))           
            <li class="<?php echo ($page_name=='product-veterinary')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/product-veterinary"><i class="fa fa-circle-o"></i> <span>Products Veterinary</span></a></li>
  @endif

   @if(in_array('product-api',$admin_modules_array) || in_array('all-modules',$admin_modules_array))           
            <li class="<?php echo ($page_name=='product-api')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/product-api"><i class="fa fa-circle-o"></i> <span>Products API</span></a></li>
  @endif

  @if(in_array('product-international',$admin_modules_array) || in_array('all-modules',$admin_modules_array))           
            <li class="<?php echo ($page_name=='product-international')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/product-international"><i class="fa fa-circle-o"></i> <span>Products International</span></a></li>
  @endif
<!--
 @if(in_array('product-category',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
          <li class="<?php echo ($page_name=='product-category')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/product-category"><i class="fa fa-circle-o"></i> <span>Category</span></a></li>
  @endif
-->

          </ul>
        </li> 

@endif




  @if(in_array('revised-product',$admin_modules_array) || in_array('revised-list',$admin_modules_array) || in_array('all-modules',$admin_modules_array))

        <li class="<?php echo ($page_name=='revised-product' || $page_name=='revised-list')?'active':''?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Revised Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             @if(in_array('revised-product',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
             <li class="<?php echo ($page_name=='revised-product')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/revised-product"><i class="fa fa-circle-o"></i> <span>Revised Products</span></a></li>
          @endif

           @if(in_array('revised-list',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
          <li class="<?php echo ($page_name=='revised-list')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/revised-list"><i class="fa fa-circle-o"></i> <span>Revised List</span></a></li>
          @endif

          </ul>
        </li> 
@endif






   @if(in_array('awards',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
        <li class="<?php echo ($page_name=='awards')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/awards"><i class="fa fa-circle-o"></i><span>Awards</span></a></li>
      @endif

       @if(in_array('heritage',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
        <li class="<?php echo ($page_name=='heritage')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/heritage"><i class="fa fa-circle-o"></i><span>Heritage</span></a></li>
      @endif


    @if(in_array('media-gallery',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
        <li class="<?php echo ($page_name=='media-gallery')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/media-gallery"><i class="fa fa-circle-o"></i><span>Media Gallery</span></a></li>
      @endif

@if(in_array('press-release',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
        <li class="<?php echo ($page_name=='press-release')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/press-release"><i class="fa fa-circle-o"></i><span>Press Release</span></a></li>
      @endif




 @if(in_array('management-team',$admin_modules_array) || in_array('all-modules',$admin_modules_array))

        <li class="<?php echo ($page_name=='management-team')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/management-team"><i class="fa fa-circle-o"></i><span>Management Team</span></a></li>
      @endif 



         @if(in_array('contact',$admin_modules_array) || in_array('newsletter',$admin_modules_array) ||   in_array('all-modules',$admin_modules_array)) 
        
         <li class="<?php echo ($page_name=='contact' || $page_name=='newsletter' || $page_name=='product-international' || $page_name=='product-api')?'active':''?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 @if(in_array('contact',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
        <li class="<?php echo ($page_name=='contact')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/contact"><i class="fa fa-circle-o"></i><span>Contact/Query Data</span></a></li>
      @endif
            
      @if(in_array('newsletter',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
        <li class="<?php echo ($page_name=='newsletter')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/newsletter"><i class="fa fa-circle-o"></i><span>Newsletter Data</span></a></li>
 @endif

  @if(in_array('collaboration',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
        <li class="<?php echo ($page_name=='collaboration')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/collaboration"><i class="fa fa-circle-o"></i><span>Collaboration Data</span></a></li>
 @endif
           

          </ul>
        </li> 

@endif

         
 

  @if(in_array('blog-post',$admin_modules_array) || in_array('blog-category',$admin_modules_array) || in_array('blog-tag',$admin_modules_array) || in_array('blog-comment',$admin_modules_array) || in_array('all-modules',$admin_modules_array))

        <li class="<?php echo ($page_name=='blog-category' || $page_name=='blog-tag' || $page_name=='blog-post' || $page_name=='blog-comment')?'active':''?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             @if(in_array('blog-post',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
             <li class="<?php echo ($page_name=='blog-post')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/blog-post"><i class="fa fa-circle-o"></i> <span>Post</span></a></li>
          @endif

           @if(in_array('blog-category',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
          <li class="<?php echo ($page_name=='blog-category')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/blog-category"><i class="fa fa-circle-o"></i> <span>Category</span></a></li>
          @endif

           @if(in_array('blog-tag',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
            <li class="<?php echo ($page_name=='blog-tag')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/blog-tag"><i class="fa fa-circle-o"></i> <span>Tags</span></a></li>
          @endif
          @if(in_array('blog-comment',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
            <li class="<?php echo ($page_name=='blog-comment')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/blog-comment"><i class="fa fa-circle-o"></i> <span>Comments</span></a></li>
          @endif

          </ul>
        </li> 
@endif

 @if(in_array('gallery',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
          <li class="<?php echo ($page_name=='gallery')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/gallery"><i class="fa fa-circle-o"></i><span>Event Gallery</span></a></li>
          @endif


        
<?php /*
 @if(in_array('visitor-track',$admin_modules_array) || in_array('all-modules',$admin_modules_array))

            <li class="<?php echo ($page_name=='visitor-track')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/visitor-track"><i class="fa fa-circle-o"></i><span>Visitor Track</span></a></li>

          @endif
*/?>

             <li class="<?php echo ($page_name=='profile' || $page_name=='admin-user' || $page_name=='redirect-url')?'active':''?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>System</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
         
              <li class="<?php echo ($page_name=='profile')?'active':''?>">
          <a href="<?php echo ADMIN_URL;?>/profile"><i class="fa fa-circle-o"></i> <span>Profile</span></a></li>

             @if(in_array('admin-user',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
             <li class="<?php echo ($page_name=='admin-user')?'active':''?>"><a href="<?php echo ADMIN_URL;?>/admin-user"><i class="fa fa-circle-o"></i><span>Admin Users</span></a></li>
           @endif


            @if(in_array('redirect-url',$admin_modules_array) || in_array('all-modules',$admin_modules_array))
             <li class="<?php echo ($page_name=='redirect-url')?'active':''?>"><a href="<?php echo ADMIN_URL;?>/redirect-url"><i class="fa fa-circle-o"></i><span>Redirect 404 Urls</span></a></li>
           @endif

          </ul>
        </li> 



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>




<!-- sidebar end -->






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$title}}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo ADMIN_URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$title}}</li>
      </ol>
    </section>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('message_susuccess'))
    <div class="alert alert-success">
        {{ session()->get('message_susuccess') }}
    </div>
@endif

@if(session()->has('message_error'))
    <div class="alert alert-error">
        {{ session()->get('message_error') }}
    </div>
@endif





  <div class="main_content-wrapper">




     @yield('content')
  
  </div>





    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>©<?php echo date('Y');?> All rights reserved.</strong> Powered By : <a target="_blank" href="https://www.grapesdigital.com/">Grapes Digital</a>
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Morris.js charts -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/raphael/raphael.min.js"></script>
<!-- <script src="{{ URL::asset('assets/admin') }}/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ URL::asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/moment/min/moment.min.js"></script>
<script src="{{ URL::asset('assets/admin') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('assets/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/admin') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/admin') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ URL::asset('assets/admin') }}/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('assets/admin') }}/dist/js/demo.js"></script>
<link href="{{ URL::asset('assets/summernote') }}/summernote.css" rel="stylesheet">
  <script src="{{ URL::asset('assets/summernote') }}/summernote.min.js"></script>

<script src="{{ URL::asset('assets/admin') }}/common-script.js"></script>



<script>
  // summernote start
     $(document).ready(function() {
              $('.summernote').summernote({
                    height: 230,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    callbacks: {
                        onImageUpload: function(files, editor, welEditable) {
                            
                        for (var i = files.length - 1; i >= 0; i--) {
                        sendFile(files[i], this);
                        }
                        },
                    },
             
              });
        
});
function sendFile(file, el) {
            var form_data = new FormData();
            form_data.append('file', file);
            $.ajax({
            data: form_data,
            type: "POST",
             url: "<?php echo url(ADMIN_FOLDER);?>/summernotefilesave",
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(url) {
            $(el).summernote('editor.insertImage', url);
            }
            });
        }
 // summernote end 
</script>


 <script>
    $(document).ready(function() {    
        $('.select2').select2()
    });
  </script>

</body>
</html>
