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
          <small>Get image</small>
        </div>
      </div>
<?php
/**
 * wrap this with your html
 **/
?>
<div class="my-3 p-3 bg-white rounded box-shadow">
    <?php echo $error;?>
    
    <?php echo form_open_multipart("contacts/get_photo/$id/image");?>
    
    <input type="file" name="userfile" size="20" />
    <?=form_hidden('id',$id);?>
    <br /><br />
    
    <input type="submit" value="upload" />
    
    <?=form_close()?>
    <p class="text-warning">Max size: 300K</p>
</div>
 </main>


<?php
          $this->load->view('inc/footer');
          $this->load->view('inc/scaffolding');
    ?>

    
  </body>
</html>

