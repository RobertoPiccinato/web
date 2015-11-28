<?php

$f3 = require('lib/base.php');

$f3->set('DEBUG', ($f3->get('HOST') == 'localhost') ? 3 : 0);

$f3->config('config.ini');

$baseUrl = sprintf('%s://%s:%s%s', $f3->get('SCHEME'), $f3->get('HOST'), $f3->get('PORT'), $f3->get('BASE'));
$f3->set('BASEURL', $baseUrl);						//	Url base del portale
$f3->set('DBAPP', new DB\SQL('sqlite:'.getcwd().'/../data/applicazione.sq3'));

$f3->set('ONERROR', function($f3) use ($isApiRequest) {

  if($f3->get('DEBUG') == 0) {
  
    echo \Template::instance()->render('templates/error.htm');
  }
  else {
    
    echo '<pre>', var_dump($f3->get('ERROR')), '</pre>';
  }
  
});

$f3->run();
