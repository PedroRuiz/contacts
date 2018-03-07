<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $project_name;?> | <?php echo $title;?></title>

    <?php
        foreach ($css as $file)
        {
            echo "<link href=\"$file\" rel=\"stylesheet\">\n";
        }
        echo "\n\n";
        if ( ! is_null($extra_css) )
        {
            if( is_array($extra_css) )
            {
                foreach ($extra_css as $file)
                {
                    echo "<link href=\"$file\" rel=\"stylesheet\">\n";
                }
            }
        }
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


            <?php $this->load->view('inc/sidebar_menu')?>


          </div>
        </div>

        <?php $this->load->view('inc/top_menu');?>

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $page_title?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Contacts</span>
              <div class="count"><?php echo $extra_data['total_contacts'];?></div>
              <span class="count_bottom"><i class="<?php echo $extra_data['contacts_this_week_class'];?>"><?php echo $extra_data['contacts_this_week'];?>% </i> From last Week</span>
            </div>
<?php /*
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
*/?>
          </div>
          <!-- /top tiles -->

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo ( ! is_null($title)) ? $title : '';?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <?php if ($collapse):?>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <?php endif;?>
                    <?php if($settings):?>
                        <?php if (is_array($setting_actions)):?>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                            <?php foreach ($setting_actions as $action):?>
                              <li><a href="<?php echo $action['url']?>"><?php echo $action['action']?></a></li>
                            <?php endforeach;?>
                            </ul>
                          </li>
                        <?php endif;?>
                    <?php endif;?>
                      <?php if ($close):?>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                      <?php endif;?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                     <br />

                    <?php
                    /* <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> */
                    echo form_open(base_url('contacts/new/action.html'),array('class'=>'form-horizontal form-label-left')); ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first_name" required="required" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control col-md-7 col-xs-12" autofocus>
                          <?php echo form_error('first_name'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('last_name'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shown_name">Shown name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="shown_name" name="shown_name" value="<?php echo set_value('shown_name'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('shown_name'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nick_name">Nick name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nick_name" name="nick_name" value="<?php echo set_value('nick_name'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('nick_name'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_email">First email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="first_email" name="first_email" value="<?php echo set_value('first_email'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('first_email'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="second_email">Second email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="second_email" name="second_email" value="<?php echo set_value('second_email'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('second_email'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="chat_nick">Chat nick
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="chat_nick" name="chat_nick" value="<?php echo set_value('chat_nick'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('chat_nick'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('mobile'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="work_phone">Work phone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="work_phone" name="work_phone" value="<?php echo set_value('work_phone'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('work_phone'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_phone">Home phone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="home_phone" name="home_phone" value="<?php echo set_value('home_phone'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('home_phone'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fax">Fax
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fax" name="fax" value="<?php echo set_value('fax'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('fax'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pager">Pager
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pager" name="pager" value="<?php echo set_value('pager'); ?>" class="form-control col-md-7 col-xs-12">
                          <?php echo form_error('pager'); ?>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php $this->load->view('inc/footer')?>
      </div>
    </div>

    <?php
        foreach ($js as $file)
        {
            echo "<script src=\"$file\"></script>\n";
        }
        echo "\n\n";
        if ( ! is_null($extra_js) )
        {
            if( is_array($extra_js) )
            {
                foreach ($extra_js as $file)
                {
                    echo "<script src=\"$file\"></script>\n";
                }
            }
        }
    ?>
  </body>
</html>
