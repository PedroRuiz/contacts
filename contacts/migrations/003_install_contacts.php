<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_contacts extends CI_Migration {
	private $table;

	public function __construct() {
		parent::__construct();
		$this->load->dbforge();

		$this->load->add_package_path(APPPATH.'third_party/contacts');
		$this->load->config('contacts', TRUE);
		
		$this->table = $this->config->item('cntcts_tablename', 'contacts');
	}

	public function up() {
		// Drop table 'cntcts_tablename' if it exists
		$this->dbforge->drop_table($this->table, TRUE);

		// Table structure for table 'groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'date_creation' => array(
				'type'      => 'timestamp',
			),
			'first_name' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	FALSE,
			),
			'last_name' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	TRUE,
			),
			'shown_name' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	TRUE,
			),
			'nick_name' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	TRUE,
			),
			'first_email' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	TRUE,
			),
			'second_email' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	TRUE,
			),
			'chat_nick' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	TRUE,
			),
			'mobile' => array(
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'		 =>	TRUE,
			),
			'work_phone' => array(
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'		 =>	TRUE,
			),
			'home_phone' => array(
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'		 =>	TRUE,
			),
			'fax' => array(
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'		 =>	TRUE,
			),
			'pager' => array(
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'		 =>	TRUE,
			),
			'image' => array(
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'		 =>	TRUE,
			),
		));
		
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->table);

		

	}

	public function down() {
		$this->dbforge->drop_table($this->table, TRUE);
	}
}
