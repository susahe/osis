<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<?php if (session()->get('sucess')): ?>
<div class="alert alert-success" role="alert">
    <?= session()->get('sucess')?>
  </div>
<?php endif; ?>
<div class="table-responsive-sm">

<table class="class="table table-hover" >

   <thead class="thead-light">

  <tr>
      <th> ID# </th>
      <th> First Name </th>
      <th> Last Name </th>
      <th> E-mail </th>
      <th> Contact No </th>
      <th> Role </th>
      <th> Created </th>
      <th> Update </th>
      <th> Last login </th>

      <th>Status </th>

  </tr>
</thead>
<tbody>

<?php foreach($users as $user){ ?>
<tr>
  <td><a class=" btn btn-primary " href="/user_profile_view/<?=esc($user['slug'],'url');?>">  <?= $user['idusers']?></a></td>
  <td> <a class=" " href="/user_profile_view/<?=esc($user['slug'],'url');?>"> <?= $user['firstname']?></a> </td>
  <td> <?= $user['lastname']?>  </td>

  <td> <?= $user['email']?>  </td>
  <td> <?= $user['mobile']?>  </td>
  <td> <?= $user['role']?>  </td>
  <td> <?= $user['created']?>  </td>
  <td> <?= $user['update']?> </td>
  <td> <?= $user['lastlogin']?>  </td>


<?php  if ($user['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_user/<?=$user['idusers'];?>"><img class="userstatus" src="<?php echo base_url('img/inactive_user.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_user/<?=$user['idusers'];?>"><img class="userstatus" src="<?php echo base_url('img/active_user.png');?>" ></a>


    <form>
      </td>
  <?php }?>

</tr>



<?php } ?>
  </tbody>
</table>
</div>
<?= $this->endSection() ?>
