<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html lang="en">
  <?=$this->load->view('inc/head.php',array('page_title'=>'Kybalion | Contacts'),TRUE)?>
  
  <body class="bg-light">

    <?php
    $this->load->view('inc/nav.main.php');
    $this->load->view('contacts_subnav');
    ?>
    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-contacts rounded box-shadow">
        <img class="mr-3" src="/assets/img/logo.svg" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Contacts</h6>
          <small></small>
        </div>
      </div>

      <div class="my-3 p-3 bg-white rounded box-shadow">
        <?php if($contacts):?>
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
                <th><?=$names['shown_name']?></th>
                <th><?=$names['mobile']?></th>
                <th><?=$names['image']?></th>
            </tr>
          </thead>  
            <tbody>
            <?php foreach($contacts as $contact):?>
            <tr onclick="window.location.href='<?=base_url('contacts/edit/'.$contact['id'].'/contact.html')?>'" style="cursor: pointer" title="edit <?=$contact['shown_name']?>">
                <td><?=$contact['shown_name']?></td>
                <td class="rowlink-skip"><?=$contact['mobile']?></td>
                <td class="rowlink-skip"><?=(!$contact['image'])
                  ?
                  '<a href="'.base_url('contacts/get_photo/'.$contact['id'].'/image.html').'"><i class="fas fa-user-secret"></i></a>'
                  :
                  '<img src="'.base_url($images.$contact['image']).'" width="32">' ;?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php endif;?>
      </div>

      
    </main>


<?php
          $this->load->view('inc/footer');
          $this->load->view('inc/scaffolding');
    ?>

    
  </body>
</html>