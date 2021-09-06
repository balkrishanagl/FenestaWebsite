<div class="breadcum">
  <div class="container-fluid">
       <div class="breadcum-box">   
        <a href="{{ url('/') }}">Home <span>»</span></a>
        <?php if(isset($breadcrumbs)){
        foreach ($breadcrumbs as $breadcrumb) { ?>
        <a href="<?php echo ($breadcrumb['link']!='')?$breadcrumb['link']:'javascript:void(0)';?>"><?php echo $breadcrumb['name'];?> <span>»</span></a>
       <?php  }
      } ?>
       <span class="text-capitalize">{{ $title }}</span>    
           
      </div>
  </div>
</div>

