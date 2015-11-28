<?php

namespace models;

class Mapper extends \db\sql\Mapper {
	
  const TABLE_NAME = '';
	const FIELD_ID = 'id';
  const DEFAULT_RESULT_SIZE = 15;

	public static function getById($id) {

    $c = new static();

    return $c->load(array(static::FIELD_ID.'=?', $id));
  }

	public static function getAll($opts = array()) {

    $c = new static();

    return $c->find(array(), $opts);
  }
	
	/**
	 * Sovrascrivere questo metodo!
	 */
	public static function getDibi() {
		
		return \Settings::getDbPortale();
	}

  public function __construct() {

		$this->db = static::getDibi();
		
		parent::__construct($this->db, static::TABLE_NAME);
  }
	
	public function getId() {
		
		return $this->get(self::FIELD_ID);
	}
	
	protected function setId($id) {
		
		$this->set(self::FIELD_ID, $id);
		
		return $this;
	}

  public function isStored() {

    return $this->get(self::FIELD_ID) > 0;
  }
	
	public function getDb() {
		
		return $this->db;
	}
}