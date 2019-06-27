<div class="x_panel">
   <div class="x_title">
      <h2>Managemen User</h2>
     <div class="clearfix"></div>
   </div>

   <div class="x_content">
      <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
         <thead>
            <tr>
               <th width="8%">No.</th>
               <th width="40%">Fullname</th>
               <th width="40%">Alamat</th>
               <th>Telp</th>
               <th>Status</th>
               <th>Opsi</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $i = 1;
            foreach($data->result() as $user) :
            ?>
            <tr>
               <td style="vertical-align:middle"><?= $i++; ?></td>
               <td style="vertical-align:middle"><?= $user->fullname; ?></td>
               <td style="vertical-align:middle"><?= $user->alamat; ?></td>
               <td style="vertical-align:middle"><?= $user->telp; ?></td>
               <td style="vertical-align:middle">
                  <?php if($user->status == 1) { ?>
                     <a href="<?=base_url();?>user/status/2/<?=$user->id_user;?>" class="btn btn-success">Active</a>
                  <?php } else { ?>
                     <a href="<?=base_url();?>user/status/1/<?=$user->id_user;?>" class="btn btn-danger">Non Active</a>
                  <?php } ?>
               </td>
               <td style="vertical-align:middle">
                  <a href="<?=base_url();?>user/detail/<?=$user->id_user;?>" class="btn btn-primary"><i class="fa fa-search-plus"></i></a>
               </td>
            </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      <p class="help-text">* Button active untuk menonaktifkan user, button non active untuk mengaktifkan user</p>
   </div>
</div>
