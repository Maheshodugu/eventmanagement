<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2> Show Event</h2>
      </div>
      <div class="pull-right">
         <a class="btn btn-primary" href="<?php echo base_url('event');?>"> Back</a>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Name:</strong>
         <?php echo $item->name; ?>
      </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Description:</strong>
         <?php echo $item->description; ?>
      </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Event Date:</strong>
             <?php echo date('d-m-Y',strtotime($item->event_date)); ?>
      </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
         <strong>Location:</strong>
         <?php echo $item->location; ?>
      </div>
   </div>
</div>