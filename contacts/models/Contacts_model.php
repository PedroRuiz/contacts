<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:
*
* Version:
*
* @author Pedro Ruiz Hidalgo
*		  ruizhidalgopedro [at] @gmail [dot] com
*         @pedroruizhidalg
*
*		  Coding the world since 1983!
*
* Location:
*
* Created:  2016.01.01
* (yyyy-mm-dd)
*
* Description:
*
* Requirements: PHP7 or above
* @package contacts
* @property config/contacts.php
*/
class Contacts_model extends CI_Model
{
    private $tablename;

    /**
    * @param none
    * @return none
    **/
    function __construct()
    {
        parent::__construct();
        $this->load->add_package_path( APPPATH . 'contacts' );
        $this->config->load('contacts');
        $this->tablename = $this->config->item('cntcts_tablename');
    }

    /**
    * @param none
    * @return int count contacts
    **/
    function count()
    {
        return $this->db->count_all_results($this->tablename);
    }

    /**
    * @param none
    * @return int count contacts
    **/
    function count_week()
    {
        return count($this->db
                    ->select('id')
                    ->from($this->tablename)
                    ->where( 'date_creation >=' , date( 'Y-m-d' , strtotime( '-7 days' ) ) )

                    ->get()->result_array()
                     );
    }

    /**
    * @param array $post
    * @return bool success insert
    **/
    function new_contact($array)
    {
        if( is_array( $array ) )
        {
            return $this->db->insert( $this->tablename , $array );
        }
    }

    /**
    * @param void
    * @return array result
    **/
    function get_all()
    {
        return $this->db->order_by('shown_name')->get($this->tablename)->result_array();
    }

    /**
    * @param int id_user
    * @param string image
    * @return bool
    **/
    function update_image( $id_user , $image )
    {
        return $this->db
                    ->set( 'image' , $image )
                    ->where( 'id' , $id_user )
                    ->update( $this->tablename );
    }

    /**
    * @param int id, $id_user
    * @return array result_array
    **/
    function get_contact($id)
    {
        return $this->db->where( 'id' , $id )->get($this->tablename)->row_array();
    }

    /**
    * @param array input->post()
    * @return bool
    **/
    function update_contact($array)
    {
        $_id    =   $array['id'];
        return $this->db->where( 'id' , $_id )->update( $this->tablename , $array );
    }

    /**
    * @param int id, id user
    * @return bool
    **/
    function delete_contact($id)
    {
        return $this->db->where( 'id' , $id )->delete( $this->tablename );
    }
}



/** this ends this file
*
*/
