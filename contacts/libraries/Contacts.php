<?php
/**
 * Name:    Contacts
 * Author:  Pedro Ruiz Hidalgo
 *           correo@pedroruizhidalgo.es
 *           @pedroruizhidalg
 *
 *
 * Created:  2018-01-31
 *
 * Description:  Contacts system for install in CodeIgniter/application/third_party
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 * @package    CodeIgniter-Contacts
 * @author     Pedro Ruiz
 * @link       http://github.com/PedroRuiz/contacts
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Contacts
 */
class Contacts
{
	/**
	 * id
	 *
	 * @var integer
	 **/
	public $id;

    /**
	 * date_creation
	 *
	 * @var string
	 **/
	public $date_creation;
    
    /**
	 * first_name
	 *
	 * @var string
	 **/
	public $first_name;
    
    /**
	 * last_name
	 *
	 * @var string
	 **/
	public $last_name;
    
    /**
	 * shown_name
	 *
	 * @var string
	 **/
	public $shown_name;
    
    /**
	 * nick_name
	 *
	 * @var string
	 **/
	public $nick_name;
    
    /**
	 * first_email
	 *
	 * @var string
	 **/
	public $first_email;
    
    /**
	 * second email
	 *
	 * @var string
	 **/
	public $second_email;
    
    /**
	 * chat_nick
	 *
	 * @var string
	 **/
	public $chat_nick;
    
    /**
	 * mobile
	 *
	 * @var string
	 **/
	public $mobile;
    
    /**
	 * work_phone
	 *
	 * @var string
	 **/
	public $work_phone;
    
    /**
	 * home_phone
	 *
	 * @var string
	 **/
	public $home_phone;
    
    /**
	 * fax
	 *
	 * @var string
	 **/
	public $fax;
    
    /**
	 * pager
	 *
	 * @var string
	 **/
	public $pager;
    
    /**
	 * image
	 *
	 * @var string
	 **/
	public $image;
	

	/**
	 * __construct
	 *
	 * @author Pedro Ruiz Hidalgo
	 */
	public function __construct()
	{
		$this->config->load('contacts', TRUE);
		$this->load->model(array('contacts_model','model'));
	}

	/**
	 * __call
	 *
	 * Acts as a simple way to call model methods without loads of stupid alias'
	 *
	 * @param string $method
	 * @param array  $arguments
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function __call($method, $arguments)
	{
		if (!method_exists( $this->ion_auth_model, $method) )
		{
			throw new Exception('Undefined method Ion_auth::' . $method . '() called');
		}
		
		return call_user_func_array( array($this->ion_auth_model, $method), $arguments);
	}

	/**
	 * __get
	 *
	 * Enables the use of CI super-global without having to define an extra variable.
	 *
	 * I can't remember where I first saw this, so thank you if you are the original author. -Militis
	 *
	 * @param    string $var
	 *
	 * @return    mixed
	 */
	public function __get($var)
	{
		return get_instance()->$var;
	}
    
    function new_contact($array)
    {
        $this->model->insert($array);
        $this->extract($array);
    }
    
    function modify_contact($array)
    {
        $this->model->update($array);
        $this->extract($array);
    }
    
    function get_contact($id)
    {
        return $this->model->get_contact();
    }
    
    function delete_contact($id)
    {
        return $this->model->delete_contact($id);
    }
    
    function get_contacts()
    {
        return $this->model->read_contacts();
    }

	private function extract($array)
    {
        if (!is_array($array)) show_error('data must arrive in an array');
        extract($array);
        $this->id               =   $id;
        $this->date_creation    =   $date_creation;
        $this->first_name       =   $first_name;
        $this->last_name        =   $last_name;
        $this->shown_name       =   $shown_name;
        $this->nick_name        =   $nick_name;
        $this->first_email      =   $first_email;
        $this->second_email     =   $second_email;
        $this->chat_nick        =   $chat_nick;
        $this->mobile           =   $mobile;
        $this->work_phone       =   $work_phone;
        $this->home_phone       =   $home_phone;
        $this->fax              =   $fax;
        $this->pager            =   $pager;
        $this->image            =   $image;
    }

}
