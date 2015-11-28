<?php

class ApplicationTemplate extends \Template {
    
  const DEFAULT_TEMPLATE = 'templates/layout.htm';

  function render($file=self::DEFAULT_TEMPLATE,$mime='text/html',array $hive=NULL,$ttl=0,$langs=NULL) {
    
    return parent::render($file, $mime, $hive, $ttl);
  }
}