<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2>Event Management System</h2>
      </div>
      <div class="pull-right">
         <a class="btn btn-success" href="<?php echo base_url('event/create') ?>"> Create New Event</a>
      </div>
   </div>
</div>
<table class="table table-bordered">
   <thead>
      <tr>
         <th>Sno</th>
         <th>Name</th>
         <th>Description</th>
         <th>Event Date</th>
         <th>Location</th>
         <th>Created At</th>
         <th>Updated At</th>
         <th width="220px">Action</th>
      </tr>
   </thead>
   <tbody>
      <?php $i = 0; foreach ($data as $item) { ?>      
      <tr>
         <td><?php echo ++$i; ?></td>
         <td><?php echo $item->name; ?></td>
         <td><?php echo $item->description; ?></td>
         <td><?php echo date('d-m-Y',strtotime($item->event_date)); ?></td>
         <td><?php echo $item->location; ?></td>
         <td><?php echo date('d-m-Y h:i:s A',strtotime($item->created_at)); ?></td>
         <td><?php if($item->updated_at){ echo date('d-m-Y h:i:s A',strtotime($item->updated_at)); } ?></td>
         <td>
            <form method="DELETE" action="<?php echo base_url('eventdelete/'.$item->id);?>">
               <a class="btn btn-info" href="<?php echo base_url('event/show/'.$item->id) ?>"> show</a>
               <a class="btn btn-primary" href="<?php echo base_url('event/edit/'.$item->id) ?>"> Edit</a>
               <button type="submit" class="btn btn-danger"> Delete</button>
            </form>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>