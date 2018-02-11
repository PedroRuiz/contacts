<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Name:    Contacts Model
 * Author:  Pedro Ruiz Hidalgo
 *           correo@pedroruizhidalgo.es
 *           @pedroruizhidalg
 *
 *
 * Created:  2018-01-31
 *
 * Description:  Contacts Controller
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 * @package    CodeIgniter-Contacts
 * @author     Pedro Ruiz Hidalgo
 * @link       http://github.com/PedroRuiz/contacts
 * @filesource
 */

class Contacts extends MY_Controller
{
    private $table;
    private $images;
    
    function __construct()
    {
        parent::__construct();
        
        $this->config->load('contacts');
        $this->table    =  $this->config->item('cntcts_tablename');
        $this->images   =  $this->config->item('cntcts_images');
        
        $this->load->library(array('form_validation'=>'valid'));
        
       
        $this->load->model(array('contacts_model'=>'model'));
        
        
        $this->load->library('upload',array(
            'upload_path'       =>  $this->images,
            'allowed_types'     =>  'gif|jpg|jpeg|png|svg',
            'max_size'          =>  '300',
            //'max_width'         =>  '1024',
            //'max_height'        =>  '768'
            )
        );
    }
    
    function index()
    {
        $data   =   array(
            'names'             =>  $this->config->item('cntcts_names'),
            'contacts'          =>  $this->model->read_contacts(),
            'contacts_active'   =>  TRUE,
            'images'            =>  $this->images
        );
        $this->load->view('cntcts_index',$data);
    }
    
    function new()
    {
        $data   =   array(
            'page_title'        =>  'Kybalion | Contacts | new',
            'contacts_active'   =>  TRUE,
            'action'            =>  'contacts/new',
        );
        
        $this->valid->set_rules($this->validation_rules());
        if ( $this->valid->run() == FALSE )
        {
            $this->load->view('cntcts_form',$data);
        } else {
            if($this->model->insert($this->input->post()))
            {
              redirect(base_url('contacts'),'refresh');
            }
            else
            {
                show_error('Error while writing contacts');
            }
           
        }
        
    }
    
    function edit($id)  //routed
    {
        $data   =   array(
            'page_title'        =>  'Kybalion | Contacts | edit' ,
            'contacts_active'   =>  TRUE,
            'contact_edit'      =>  $this->model->get_contact($id),
            'action'            =>  "contacts/edit/$id/contact",
            'images'            =>  $this->images
        );
        
        
        $this->valid->set_rules($this->validation_rules());
        if ( $this->valid->run() == FALSE )
        {
            $this->load->view('cntcts_form',$data);
        }
        else
        {
            $data_=$this->input->post();
            $data_['id']=$id;
            if($this->model->update($data_))
            {
              redirect(base_url('contacts'),'refresh');
            }
            else
            {
                show_error('Error while updating contacts');
            }
           
        }
    }
    
    function get_photo($id) //routed
    { 
        
        

        
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors(),'id'=>$id);

            $this->load->view('cntcts_upload_form', $error);
                
        }
        else
        {
            
            if (is_file($old_image  =   $this->images.$this->model->get_contact($id)['image']))
            {
                unlink($old_image);
            }
            $this->model->write_user_image($this->upload->data('file_name'),$id); 
            redirect(base_url('contacts'),'refresh');
        }
    }
    
    private function validation_rules()
    {
        return array(
            array(
                'field'     =>      'first_name',
                'label'     =>      'First name',
                'rules'     =>      'htmlspecialchars|trim|required|min_length[3]|max_length[100]'
            ),
             array(
                'field'     =>      'last_name',
                'label'     =>      'Last name',
                'rules'     =>      'htmlspecialchars|trim|min_length[3]|max_length[100]'
            ),
              array(
                'field'     =>      'shown_name',
                'label'     =>      'Shown name',
                'rules'     =>      'required|htmlspecialchars|trim|min_length[3]|max_length[100]'
            ),
               array(
                'field'     =>      'nick_name',
                'label'     =>      'Nick name',
                'rules'     =>      'htmlspecialchars|trim|min_length[3]|max_length[100]'
            ),
                array(
                'field'     =>      'first_email',
                'label'     =>      'First email',
                'rules'     =>      'htmlspecialchars|trim|valid_email|min_length[3]|max_length[100]'
            ),
                 array(
                'field'     =>      'second_name',
                'label'     =>      'second name',
                'rules'     =>      'htmlspecialchars|trim|valid_email|min_length[3]|max_length[100]'
            ),
                array(
                'field'     =>      'chat_nick',
                'label'     =>      'Chat nick',
                'rules'     =>      'htmlspecialchars|trim|min_length[3]|max_length[100]'
            ),
                array(
                'field'     =>      'mobile',
                'label'     =>      'Mobile',
                'rules'     =>      'htmlspecialchars|trim|max_length[50]'
            ),
                array(
                'field'     =>      'work_phone',
                'label'     =>      'Work phone',
                'rules'     =>      'htmlspecialchars|trim|max_length[50]'
            ),
                array(
                'field'     =>      'home_phone',
                'label'     =>      'Home phone',
                'rules'     =>      'htmlspecialchars|trim|max_length[50]'
            ),
                array(
                'field'     =>      'fax',
                'label'     =>      'fax',
                'rules'     =>      'htmlspecialchars|trim|max_length[50]'
            ),
                /**
                 array(
                'field'     =>      'pager',
                'label'     =>      'Pager',
                'rules'     =>      ''
            ),
                **/
        );
    }
}