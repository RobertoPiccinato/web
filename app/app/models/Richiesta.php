<?php

namespace models;


class Richiesta extends \models\Mapper {

  const TABLE_NAME = 'richieste';
  
  const FIELD_CELLULARE = 'cell';
  const FIELD_INDIRIZZO_VIA = 'indvia';
  const FIELD_INDIRIZZO_CAP = 'indcap';
  const FIELD_INDIRIZZO_CITTA = 'indcitta';
  const FIELD_INDIRIZZO_PROVINCIA = 'indprov';
  const FIELD_TIPO_AUTO = 'tipoauto';
  const FIELD_TIPO_RICHIESTA = 'tiporich';
  const FIELD_NOTE = 'note';
  
  const TIPO_AUTO_BERLINA = 1;
  const TIPO_AUTO_MINIVAN = 2;
  const TIPO_AUTO_TRASPORTO_CARROZZINA = 3;
  
  const TIPO_RICHIESTA_ORDINE = 0;
  const TIPO_RICHIESTA_PRENOTAZIONE = 1;

	public static function getDibi() {
		
		return \F3::instance()->get('DBAPP');
	}
  
  public static function crea($tipo) {
    
    $r = new static();
    
    return $r
      ->setTipoRichiesta($tipo)
      ->setTipoAuto(self::TIPO_AUTO_BERLINA);
  }

  
  public function getCellulare() {

    return $this->get(self::FIELD_CELLULARE);
  }
  
  public function setCellulare($v) {

    $this->set(self::FIELD_CELLULARE, $v);
    
    return $this;
  }

  public function getIndirizzoVia() {

    return $this->get(self::FIELD_INDIRIZZO_VIA);
  }
  
  public function setIndirizzoVia($v) {

    $this->set(self::FIELD_INDIRIZZO_VIA, $v);
    
    return $this;
  }

  public function getIndirizzoCap() {

    return $this->get(self::FIELD_INDIRIZZO_CAP);
  }
  
  public function setIndirizzoCap($v) {

    $this->set(self::FIELD_INDIRIZZO_CAP, $v);
    
    return $this;
  }

  public function getIndirizzoCitta() {

    return $this->get(self::FIELD_INDIRIZZO_CITTA);
  }
  
  public function setIndirizzoCitta($v) {

    $this->set(self::FIELD_INDIRIZZO_CITTA, $v);
    
    return $this;
  }

  public function getIndirizzoProvincia() {

    return $this->get(self::FIELD_INDIRIZZO_PROVINCIA);
  }
  
  public function setIndirizzoProvincia($v) {

    $this->set(self::FIELD_INDIRIZZO_PROVINCIA, $v);
    
    return $this;
  }

  public function getTipoAuto() {

    return $this->get(self::FIELD_TIPO_AUTO);
  }

  public function setTipoAuto($tipo) {

    $this->set(self::FIELD_TIPO_AUTO, $tipo);
    
    return $this;
  }
  
  public function isAutoBerlina() {
    
    return $this->getTipoAuto() == self::TIPO_AUTO_BERLINA;
  }
  
  public function isAutoMinivan() {
    
    return $this->getTipoAuto() == self::TIPO_AUTO_MINIVAN;
  }
  
  public function isAutoTrasportoCarrozzina() {
    
    return $this->getTipoAuto() == self::TIPO_AUTO_TRASPORTO_CARROZZINA;
  }

  public function getTipoRichiesta() {

    return $this->get(self::FIELD_TIPO_RICHIESTA);
  }
  
  public function isRichiestaOrdine() {
    
    return $this->getTipoRichiesta() == self::TIPO_RICHIESTA_ORDINE;
  }
  
  public function isRichiestaPrenotazione() {
    
    return $this->getTipoRichiesta() == self::TIPO_RICHIESTA_PRENOTAZIONE;
  }

  protected function setTipoRichiesta($tipo) {

    $this->set(self::FIELD_TIPO_RICHIESTA, $tipo);
    
    return $this;
  }

  public function getNote() {

    return $this->get(self::FIELD_NOTE);
  }
  
  public function setNote($v) {

    $this->set(self::FIELD_NOTE, $v);
    
    return $this;
  }
}
