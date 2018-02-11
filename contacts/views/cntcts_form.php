<?php defined('BASEPATH') OR exit('No direct script access allowed');
  if(isset($contact_edit)) extract($contact_edit);
?>
<!doctype html>
<html lang="en">
  <?=$this->load->view('inc/head.php','',TRUE)?>

  <body class="bg-light">

    <?=$this->load->view('inc/nav.main.php','',TRUE)?>
    <?=$this->load->view('contacts_subnav.php','',TRUE)?>
    
    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-contacts rounded box-shadow">
        <img class="mr-3" src="/assets/img/logo.svg" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Contacts</h6>
          <?php if ( isset($shown_name) ) :?>
          <small>Edit <?=$shown_name?></small>
          <?php endif;?>
        </div>
      </div>
      <?php if ( isset($image) ):?>
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <a href="<?=base_url("contacts/get_photo/$id/image.html")?>"><img src="<?=base_url("$images/$image");?>" width="100"></a>
        <?php else:?>
        <?php if(isset($id)):?>
        <a href="<?=base_url("contacts/get_photo/$id/image.html")?>"><i class="fas fa-user-secret" style="width:100px; height:100px;"></i></a>
        <?php endif;?>
      <?php endif;?>
        <?php if (isset($first_email)):?>
        <br><a href="mailto:<?=$first_email?>"><?=$first_email?></a>
        <?php endif;?>
        <?php if (isset($second_email)):?>
        <br><a href="mailto:<?=$second_email?>"><?=$second_email?></a>
        <?php endif;?>
      </div>
      
      <div class="my-3 p-3 bg-white rounded box-shadow">
        
            <?=form_open(base_url($action),array('class'=>'form-horizontal','role'=>'form'))?>
              <div class="form-group">
                <label for="first_name" class="col-lg-2 control-label">First name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="first_name" value="<?=(isset($first_name)) ? $first_name : set_value('first_name');?>" id="first_name" placeholder="First name" autofocus>
                  <div class="text-danger"><?php echo form_error('first_name'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="last_name" class="col-lg-2 control-label">Last name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="last_name" value="<?=(isset($last_name)) ? $last_name : set_value('last_name');?>" id="last_name" placeholder="Last name">
                  <div class="text-danger"><?php echo form_error('last_name'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="shown_name" class="col-lg-2 control-label">Shown name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="shown_name" value="<?=(isset($shown_name)) ? $shown_name : set_value('shown_name');?>" id="shown_name" placeholder="Shown name">
                  <div class="text-danger"><?php echo form_error('shown_name'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="nick_name" class="col-lg-2 control-label">Nick name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="nick_name" value="<?=(isset($nick_name)) ? $nick_name : set_value('nick_name');?>" id="nick_name" placeholder="Nick name">
                  <div class="text-danger"><?php echo form_error('nick_name'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="first_email" class="col-lg-2 control-label">First email</label>
                <div class="col-lg-10">
                  <input type="email" class="form-control" name="first_email" value="<?=(isset($first_email)) ? $first_email : set_value('first_email');?>" id="first_email" placeholder="First email">
                  <div class="text-danger"><?php echo form_error('first_email'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="second_email" class="col-lg-2 control-label">Second email</label>
                <div class="col-lg-10">
                  <input type="email" class="form-control" name="second_email" value="<?=(isset($second_email)) ? $second_email : set_value('second_email');?>" id="second_email" placeholder="Second email">
                  <div class="text-danger"><?php echo form_error('second_email'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="chat_nick" class="col-lg-2 control-label">Chat nick</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="chat_nick" value="<?=(isset($chat_nick)) ? $chat_nick : set_value('chat_nick');?>" id="chat_nick" placeholder="Chat_nick">
                  <div class="text-danger"><?php echo form_error('chat_nick'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="mobile" class="col-lg-2 control-label">Mobile</label>
                <div class="col-lg-10">
                  <input type="tel" class="form-control" name="mobile" value="<?=(isset($mobile)) ? $mobile : set_value('mobile');?>" id="mobile" placeholder="Mobile">
                  <div class="text-danger"><?php echo form_error('mobile'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="work_phone" class="col-lg-2 control-label">Whork phone</label>
                <div class="col-lg-10">
                  <input type="tel" class="form-control" name="work_phone" value="<?=(isset($work_phone)) ? $work_phone : set_value('work_phone');?>" id="work_phone" placeholder="Work phone">
                  <div class="text-danger"><?php echo form_error('work_phone'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="home_phone" class="col-lg-2 control-label">Home phone</label>
                <div class="col-lg-10">
                  <input type="tel" class="form-control" name="home_phone" value="<?=(isset($home_phone)) ? $home_phone : set_value('home_phone');?>" id="home_phone" placeholder="Home phone">
                  <div class="text-danger"><?php echo form_error('home_phone'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="fax" class="col-lg-2 control-label">Fax</label>
                <div class="col-lg-10">
                  <input type="tel" class="form-control" name="fax" value="<?=(isset($fax)) ? $fax : set_value('fax');?>" id="fax" placeholder="Fax">
                  <div class="text-danger"><?php echo form_error('fax'); ?></div>
                </div>
              </div>
              <div class="form-group">
                <label for="pager" class="col-lg-2 control-label">Pager</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="pager" value="<?=(isset($pager)) ? $pager : set_value('pager');?>" id="pager" placeholder="Pager">
                  <div class="text-danger"><?php echo form_error('pager'); ?></div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
                </div>
              </div>
            <?=form_close()?>


      </div>

      
    </main>
    
    
    
    
    
    
    
    <?php
          $this->load->view('inc/footer');
          $this->load->view('inc/scaffolding');
    ?>

    
  </body>
</html>