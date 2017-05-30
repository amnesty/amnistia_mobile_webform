<?php

  switch($output) {
    case '0':
      print t('Incomplete');
      break;

    case '1':
      print t('Remember');
      break;

    case '2':
      print t('Complete');
      break;

    default:
      print $output;
  }
?>
