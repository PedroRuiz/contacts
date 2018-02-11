<?php
/**
 * Name:    Contacts Model
 * Author:  Pedro Ruiz Hidalgo
 *           correo@pedroruizhidalgo.es
 *           @pedroruizhidalg
 *
 *
 * Created:  2018-01-31
 *
 * Description:  This is the configuration file for the third_party contacts project
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 * @package    CodeIgniter-Contacts
 * @author     Pedro Ruiz Hidalgo
 * @link       http://github.com/PedroRuiz/CodeIgniter-Contacts
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Contacts Model
 *
 * @property contacts Library
 */
class Contacts_model extends CI_Model
{
    /**
	 * table
	 *
	 * @var string
	 **/
	private $table;
    
    function __construct()
    {
        
        $this->config->load('contacts', TRUE);
        
        $this->table = $this->config->item('cntcts_tablename');
    }
    
    function read_contacts()
    {
        return $this->db->get($this->table)->result_array();
    }
    
    function get_contact($id)
    {
        return $this->db->where('id',$id)->get($this->table)->row_array();
    }
    
    function update($data)
    {
        if(!is_array($data)) show_error('data must be an array');
        //var_dump($data); exit;
		extract($data);
		
		// for security reasons I prefer this over replace
        
		$this->db->set('first_name',$first_name);
		$this->db->set('last_name',$last_name);
		$this->db->set('shown_name',$shown_name);
		$this->db->set('nick_name',$nick_name);
		$this->db->set('first_email',$first_email);
		$this->db->set('first_name',$first_name);
		$this->db->set('second_email',$second_email);
		$this->db->set('chat_nick',$chat_nick);
		$this->db->set('mobile',$mobile);
		$this->db->set('work_phone',$work_phone);
		$this->db->set('home_phone',$home_phone);
		$this->db->set('fax',$fax);
		$this->db->set('pager',$pager);
		
		$this->db->where('id',$id);
		return $this->db->update($this->table);
    }
    
    function delete($id)
    {
        return $this->db->delete($this->table,array('id',$id));
    }
    
    function insert($data)
    {

        if(!is_array($data)) show_error('data must be an array');
        
        return $this->db->insert($this->table,$data);
    }
	
	function write_user_image($image,$id)
	{ 
		$this->db->set('image',$image)->where('id',$id)->update($this->table);
	}
    
}