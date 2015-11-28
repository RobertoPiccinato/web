<?php

namespace controllers;

use models\Richiesta;


class Richieste {
  
  public function main($f3) {

    $f3->set('content', 'templates/main.htm');
    
    echo \ApplicationTemplate::instance()->render();
  }
  
  public function manage($f3) {

    $tipo = $f3->get('REQUEST.tipo');
    
    if($tipo === null || !in_array(intval($tipo), array(Richiesta::TIPO_RICHIESTA_ORDINE, Richiesta::TIPO_RICHIESTA_PRENOTAZIONE))) {
     
      $f3->error(500, 'Tipo di richiesta non valido');
    }
  
    $richiesta = Richiesta::crea($tipo);
  
    $messages = array();
  
    if($f3->exists('POST.tipo')) {
      
      $cell = trim($f3->get('POST.cell'));
      $indVia = trim($f3->get('POST.indvia'));
      $indCitta = trim($f3->get('POST.indcitta'));
      $indCap = trim($f3->get('POST.indcap'));
      $indProv = strtoupper(trim($f3->get('POST.indprov')));
      $tipoAuto = intval($f3->get('POST.tipoauto'));
      
      if(strlen($cell) == 0) $messages[] = 'Numero cellulare non valido';
      if(strlen($indVia) == 0) $messages[] = 'Indirizzo non valido';
      if(strlen($indCitta) == 0) $messages[] = 'Citta non valida';
      if(strlen($indCap) == 0) $messages[] = 'Cap non valido';
      if(strlen($indProv) != 2) $messages[] = 'Provincia non valida';
      if(!in_array(intval($tipo), array(Richiesta::TIPO_RICHIESTA_ORDINE, Richiesta::TIPO_RICHIESTA_PRENOTAZIONE))) {
        
        $messages[] = 'Tipo di auto non valido';
      }
      
      $richiesta
        ->setCellulare($cell)
        ->setIndirizzoVia($indVia)
        ->setIndirizzoCitta($indCitta)
        ->setIndirizzoCap($indCap)
        ->setIndirizzoProvincia($indProv)
        ->setTipoAuto($tipoAuto)
        ->setNote($f3->get('POST.note'));
        
      if(count($messages) == 0) {
        
        $richiesta->save();
        
        $f3->reroute('/richiesta/'.$richiesta->getId());
        
        exit;
      }
    }
  
    $f3->set('content', 'templates/richiesta.htm');
    $f3->set('data', (object)array(
      'richiesta' => $richiesta,
      'messages' => $messages
    ));
    
    echo \ApplicationTemplate::instance()->render();
  }
  
  public function success($f3) {

    $richiesta = Richiesta::getById($f3->get('PARAMS.id'));
  
    if(!$richiesta) $f3->error(500, 'Richiesta non valida');
  
    $f3->set('content', 'templates/richiesta_success.htm');
    $f3->set('data', (object)array(
      'richiesta' => $richiesta
    ));
    
    echo \ApplicationTemplate::instance()->render();
  }
}
