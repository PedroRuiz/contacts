<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Contacts_lib.php
*
* Version: 1.0
*
* @author: Pedro Ruiz Hidalgo
*		  ruizhidalgopedro [at] gmail [dot] com
*         @pedroruizhidalg
*
*		  Coding the world since 1983!
*
* Location: application/third_party/contacts/libraries/Contacts_lib.php
*
* Created:  2016.01.01
* (yyyy-mm-dd)
*
* Description:  Manage contacts
*
* Requirements: PHP7 or above
*
* @package contacts
* @property contacts_model
*/
class Contacts_lib
{
    private $igniter;

    protected $contact  = array();

    /**
    * @param none
    * @return none
    */
    function __construct()
    {
        $this->igniter=& get_instance();

        $this->igniter->load->model( 'contacts_model' );
    }

    /**
    * @param none
    * @return none
    */
    function __destruct()
    {
        unset($this->contact);
    }

    /**
    * @param string $name property name
    * @param mixed $value property value
    * @return none
    */
    function __set( $name , $value )
    {
        $this->contact[$name]   = $value;
    }

    /**
    * @param string $name property name
    * @return mixed
    */
    function __get( $name )
    {
        if ( array_key_exists( $name , $this->contact ) )
        {
            return $this->contact[$name];
        }
    }

    /**
    * @param none
    * @return int count of contacts
    **/
    function get_count()
    {
        return $this->igniter->contacts_model->count();
    }

    /**
    * @param none
    * @return int count of contacts
    **/
    function get_count_last_week()
    {
        return $this->igniter->contacts_model->count_week();
    }

    /**
    * @param array $post()
    * @return bool sucess of write
    **/
    function new_contact($array)
    {
        return $this->igniter->contacts_model->new_contact($array);

    }

    /**
    * @param void
    * @return array result
    **/
    function get_all()
    {
        return $this->igniter->contacts_model->get_all();

    }

    /**
    * @param int id_contact
    * @param string image
    * @return bool
    **/
    function update_image( $id_user , $image )
    {
        return $this->igniter->contacts_model->update_image( $id_user , $image );
    }

    /**
    * @param int id, idcontact
    * @return array result_array
    **/
    function get_contact($id)
    {
        return $this->igniter->contacts_model->get_contact($id);
    }

    /**
    * @param array input->post()
    * @return bool
    **/
    function update_contact($array)
    {
        return $this->igniter->contacts_model->update_contact($array);
    }

    /**
    * @param int id, id user
    * @return bool
    **/
    function delete_contact($id)
    {
        return $this->igniter->contacts_model->delete_contact($id);
    }
}



/** this ends this file
* application/third_party/contacts/libraries/Contacts_lib.php
*/
