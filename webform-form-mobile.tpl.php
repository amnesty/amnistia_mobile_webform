<?php
/**
 * Created by PhpStorm.
 * User: andres.cuervo.adame
 * Date: 11/09/2017
 * Time: 12:22
 */

  if($form['details']['page_count']['#value'] > 1){
    $output_pagenum = '<div class="page-count">Page '
      . '<span class="actual">' . $form['details']['page_num']['#value'] . '</span>' . ' of '
      . '<span class="total">' . $form['details']['page_count']['#value'] . '</span>';
    echo $output_pagenum . '</div>';
    // End of custom code
  }

  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
  print drupal_render($form);