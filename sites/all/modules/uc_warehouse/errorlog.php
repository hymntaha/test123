<?php

function writeLog($orderid, $message) {
  $filename = dirname(__FILE__) . '/error.txt';
  
  $contents = str_repeat('-', 50) . "\n";
  $contents .= date("D M j G:i:s T Y", time()) . ' : (' . $orderid . ') ' . $message . "\n";
  $handle = fopen($filename, 'a');
  fwrite($handle, $contents);

  fclose($handle);
}
