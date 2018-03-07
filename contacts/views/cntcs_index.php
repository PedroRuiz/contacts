<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $project_name;?> | <?php echo url_title($title);?></title>

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

                    <?php if ( ! isset($content) ):?>
                        No contacts jet
                    <?php else:?>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Shown name</th>
                              <th>First email</th>
                              <th>Mobile</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                        <?php foreach ($content as $contact):?>
                            <tr>
                              <th scope="row"><?php echo $contact['id'] ;?></th>
                              <td>
                                  <?php if ( is_null( $contact['image'] ) ) :?>
                                  <a href="<?php echo base_url("contacts/add_photo/{$contact['id']}/action.html"); ?>"><span class="glyphicon glyphicon-user" width="32px" aria-hidden="true"></span></a>
                                  <?php else:?>
                                    <img src="<?php echo "/{$extra_data['contact_images']}/{$contact['image']}"; ?>" class="img-circle" width="32px">
                                  <?php endif;?>
                              </td>
                              <td class="modalShownName"><?php echo $contact['shown_name'] ;?></td>
                              <td class="modalEmail"><?php echo $contact['first_email'] ;?></td>
                              <td><?php echo $contact['mobile'] ;?></td>
                              <td>


                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle"
                                          data-toggle="dropdown">
                                    Actions <span class="caret"></span>
                                  </button>

                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo base_url("contacts/edit/{$contact['id']}/action.html");?>">Edit</a></li>
                                    <li><a href="<?php echo base_url("contacts/delete/{$contact['id']}/action.html");?>">Delete</a></li>
                                  </ul>
                                </div>


                              </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                      </table>
                    <?php endif;?>


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
    <!-- Small modal -->


      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="ventanaModal">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Eliminar Contacto</h4>
            </div>
            <div class="modal-body">
              <h4 class="modalShownName"></h4>
              <h4 class="modalEmail"></h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>

          </div>
        </div>
      </div>
      <!-- /modals -->

<script type="text/javascript">
    function mostrarContacto (contenedor)
    {
        modal.getElementsByClassName('modalShownName')[0].innerText = contenedor.getElementsByClassName('modalShownName')[0].innerText;
        $('#ventanaModal').modal('show');

    }
</script>


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
