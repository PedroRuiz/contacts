<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Contacts.php
*
* Version:
*
* @author: Pedro Ruiz Hidalgo
*		  ruizhidalgopedro [at] gmail [dot] com
*         @pedroruizhidalg
*
*		  Coding the world since 1983!
*
* Location: application/controllers/Contactgs.php
*
* Created:  2018-03-01
* (yyyy-mm-dd)
*
* Description: Manage contacts
*
* Requirements: PHP7 or above
*
* @package contacts
*
*/

class Contacts extends MY_Controller
{
    private $total_contacts;
    private $contacts_week_percent;
    private $contacts_this_week;

    private $percent_mask       = '%3.2f';

    private $class_positive     = 'green';
    private $class_negative     = 'red';

    private $validation_rules   = array();

    private $contact_images;

	function __construct()
    {
        parent::__construct();
        $this->load->library( array( 'contacts_lib' => 'lib' ) );
        $this->total_contacts           =   $this->lib->get_count();
        $this->contacts_this_week       =   $this->lib->get_count_last_week();
        $this->contacts_week_percent    =   ( $this->contacts_this_week > 0 ) ? ( 100 * $this->contacts_this_week ) / $this->total_contacts : 0;

        $this->config->load('contacts');
        $this->contact_images           =   $this->config->item('cntcts_images');

        $this->load->library('upload',array(
            'upload_path'       =>  $this->contact_images,
            'allowed_types'     =>  'gif|jpg|jpeg|png|svg',
            'max_size'          =>  '300',
            //'max_width'         =>  '1024',
            //'max_height'        =>  '768'
        ));
    }

	function index()
	{
        $this->title="Contacts list";
        $this->settings=TRUE;

        $this->setting_actions = array(
            array(
                'url'       =>  base_url('contacts/new/action.html'),
                'action'    =>  'New contact'
                )
        );
        $this->set_extra_data(array(
            'total_contacts'           =>  $this->total_contacts,
            'contacts_this_week'       =>  sprintf($this->percent_mask,$this->contacts_week_percent),
            'contacts_this_week_class' =>  ($this->contacts_week_percent > 0) ? $this->class_positive : $this->class_negative,
            'contact_images'           =>   $this->contact_images,
            'curr_contacts'            =>   TRUE
        ));


        $this->render('cntcs_index',$this->lib->get_all());
	}

    function new()
    {
        if( ! class_exists( 'form_validation') ) $this->load->library( array( 'form_validation'=>'fv') );
        if( ! class_exists( 'form') ) $this->load->helper( 'form' );
        if( ! class_exists( 'url') ) $this->load->helper( 'url' );

        $this->validation_rules=$this->set_validation_rules();
        $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->fv->set_rules($this->validation_rules);

        $this->title="New contact";
        $this->settings=FALSE;

        $this->set_extra_data(array(
            'total_contacts'        =>  $this->total_contacts,
            'contacts_this_week'       =>  sprintf($this->percent_mask,$this->contacts_week_percent),
            'contacts_this_week_class' =>  ($this->contacts_week_percent > 0) ? $this->class_positive : $this->class_negative,
            'curr_contacts'            =>   TRUE
        ));
        if( $this->fv->run() === FALSE )
            $this->render('cntcs_new');
        else
            if( $this->lib->new_contact( $this->input->post() ) )
                redirect( base_url('contacts/action.html') , 'refresh' );
    }

    function add_photo($id)
    {
        $this->title        = "Contacts add photo";
        $this->settings     = FALSE;
        $this->extra_css    = array(
                                    "{$this->gentelella['vendors']}nprogress/nprogress.css",
                                    "{$this->gentelella['vendors']}dropzone/dist/min/dropzone.min.css"
                                );
        $this->extra_js    = array(
                                    "{$this->gentelella['vendors']}nprogress/nprogress.js",
                                    "{$this->gentelella['vendors']}dropzone/dist/min/dropzone.min.js",
                                    //"{$this->gentelella['vendors']}gestion/js/my_dropzone.js"
                                );
        $this->set_extra_data(array(
            'total_contacts'            =>  $this->total_contacts,
            'contacts_this_week'        =>  sprintf($this->percent_mask,$this->contacts_week_percent),
            'contacts_this_week_class'  =>  ($this->contacts_week_percent > 0) ? $this->class_positive : $this->class_negative,
            'curr_contacts'            =>   TRUE
        ));


        if ( ! $this->upload->do_upload('file') )
        {
            $this->render('cntcs_upload' , array('error' => $this->upload->display_errors() ) );
        }
        else
        {
            if ( $this->lib->update_image( $id, $this->upload->data()['file_name'] ) )
                redirect(base_url('contacts/action.html'),'refresh');
        }
    }

    /**
    * @param int id, $id_user
    * @return NULL
    **/
    function edit($id)
    {
        if( ! class_exists( 'form_validation') ) $this->load->library( array( 'form_validation'=>'fv') );
        if( ! class_exists( 'form') ) $this->load->helper( 'form' );
        if( ! class_exists( 'url') ) $this->load->helper( 'url' );

        $this->validation_rules=$this->set_validation_rules();
        $this->fv->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->fv->set_rules($this->validation_rules);

        $this->title        = "Edit user";
        $this->settings     = FALSE;
        $this->extra_css    = array(
                                    "{$this->gentelella['vendors']}nprogress/nprogress.css",
                                    "{$this->gentelella['vendors']}dropzone/dist/min/dropzone.min.css"
                                );
        $this->extra_js    = array(
                                    "{$this->gentelella['vendors']}nprogress/nprogress.js",
                                    "{$this->gentelella['vendors']}dropzone/dist/min/dropzone.min.js",
                                    //ç"{$this->gentelella['vendors']}gestion/js/my_dropzone.js"
                                );
        $this->set_extra_data(array(
            'total_contacts'            =>  $this->total_contacts,
            'contacts_this_week'        =>  sprintf($this->percent_mask,$this->contacts_week_percent),
            'contacts_this_week_class'  =>  ($this->contacts_week_percent > 0) ? $this->class_positive : $this->class_negative,
            'contact_images'            =>  $this->contact_images,
            'id'                        =>  $id,
            'curr_contacts'             =>   TRUE
        ));


        if( $this->fv->run() === FALSE )
        {
            $this->render('cntcs_edit' , $this->lib->get_contact($id) );
        }
        else
        {
            if( $this->lib->update_contact( $this->input->post() ) )
            {
                redirect( base_url('contacts/action.html') , 'refresh' );
            }
        }


    }

    /**
    * @param int id, id user
    * @return bool
    **/
    function delete($id)
    // IDEA: falta borrado modal
    {
        if ( $this->lib->delete_contact($id) ) redirect( base_url('contacts/action.html')  , 'refresh' );
    }



    /**
    * @param void
    * @return array validation rules
    **/
    private function set_validation_rules()
    {
        return array(
            array(
                'field'     =>  'first_name',
                'label'     =>  'First name',
                'rules'     =>  'required|trim|htmlspecialchars|max_length[100]|min_length[3]'
            ),
            array(
                'field'     =>  'last_name',
                'label'     =>  'Last name',
                'rules'     =>  'trim|htmlspecialchars|max_length[100]'
            ),
            array(
                'field'     =>  'shwon_name',
                'label'     =>  'Shown name',
                'rules'     =>  'trim|htmlspecialchars|max_length[100]'
            ),
            array(
                'field'     =>  'nick_name',
                'label'     =>  'Nick name',
                'rules'     =>  'trim|htmlspecialchars|max_length[100]'
            ),
            array(
                'field'     =>  'first_email',
                'label'     =>  'First email',
                'rules'     =>  'valid_email|trim|htmlspecialchars|max_length[100]'
            ),
            array(
                'field'     =>  'second_email',
                'label'     =>  'Second email',
                'rules'     =>  'valid_email|trim|htmlspecialchars|max_length[100]'
            ),
            array(
                'field'     =>  'chat_nick',
                'label'     =>  'Chat nick',
                'rules'     =>  'trim|htmlspecialchars|max_length[100]'
            ),
            array(
                'field'     =>  'mobile',
                'label'     =>  'Mobile',
                'rules'     =>  'trim|htmlspecialchars|max_length[50]'
            ),
            array(
                'field'     =>  'work_phone',
                'label'     =>  'Work phone',
                'rules'     =>  'trim|htmlspecialchars|max_length[50]'
            ),
            array(
                'field'     =>  'home_phone',
                'label'     =>  'Home phone',
                'rules'     =>  'trim|htmlspecialchars|max_length[50]'
            ),
            array(
                'field'     =>  'fax',
                'label'     =>  'Fax',
                'rules'     =>  'trim|htmlspecialchars|max_length[50]'
            ),
            array(
                'field'     =>  'pager',
                'label'     =>  'Pager',
                'rules'     =>  'trim|htmlspecialchars|max_length[100]'
            )
        );
    }
}

/** this ends this file
* application/controllers/Contactgs.php
*/
