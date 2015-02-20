<?php
/**
 * @file
 * template.php
 *
 * @author ananto@sepulsa.com
 * @since February 2nd 2015
 */

function sepulsa_form_alter(&$form, &$form_state, $form_id) {
  //drupal_set_message("<pre>".print_r($form_id, true)."</pre>");
  $commer_form_id = substr($form_id, 0, 25);
  if ($form_id == "sepulsa_phone_form") {
    //drupal_set_message("<pre>".print_r($form, true)."</pre>");
    $form['phone']['#title'] = NULL;
    $form['phone']['#attributes']['class'] = array('input-text', 'full-width');
    $form['phone']['#attributes']['placeholder'] = t('Masukkan Nomor Handphone (mis. 081234567890)');

    $form['operator']['#title'] = NULL;
    $form['operator']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Operator');

    $form['card_type']['#title'] = NULL;
    $form['card_type']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Pilihan Kartu');

    $form['packet']['#title'] = NULL;
    $form['packet']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Pilihan Paket');
  } else if ($form_id == "user_login_block") {
    //drupal_set_message("<pre>".print_r($form, true)."</pre>");
    $form['name']['#title'] = NULL;
    $form['name']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Alamat Email');
    
    $form['pass']['#title'] = NULL;
    $form['pass']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Password');
    
    $form['actions']['submit']['#attributes'] = array('class' => array('btn', 'style1'));
    $form['links']['#markup'] = l(t('Request New Password'), 'user/password');
    
  } else if ($commer_form_id == 'commerce_cart_add_to_cart' && arg(0) == 'coupon') {
    //drupal_set_message("<pre>".print_r($form, true)."</pre>");
    $form['submit']['#attributes'] = array('class' => array('btn', 'btn-sm', 'style3', 'post-read-more'));
    
  } else if ($form_id == "user_login") {
    //drupal_set_message("<pre>".print_r($form, true)."</pre>");
    $form['name']['#title'] = NULL;
    $form['name']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Alamat Email');
    
    $form['pass']['#title'] = NULL;
    $form['pass']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Password');
    
    $form['actions']['submit']['#attributes'] = array('class' => array('btn', 'style1'));
    $form['links']['#markup'] = l(t('Request New Password'), 'user/password');
    
  } else if ($form_id == "user_register_form") {
    //drupal_set_message("<pre>".print_r($form, true)."</pre>");
    $form['account']['name']['#title'] = NULL;
    $form['account']['name']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Username');
    
    $form['account']['mail']['#title'] = NULL;
    $form['account']['mail']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Alamat Email');
    
    $form['actions']['submit']['#attributes'] = array('class' => array('btn', 'style1'));
    
  } else if ($form_id == "user_pass") {
    //drupal_set_message("<pre>".print_r($form, true)."</pre>");
    $form['name']['#title'] = NULL;
    $form['name']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => 'Alamat Email');
    
    $form['actions']['submit']['#attributes'] = array('class' => array('btn', 'style1'));
    
  } else if ($form_id == "commerce_checkout_form_checkout") {
    global $user;
    
    //drupal_set_message("<pre>".print_r($form['commerce_payment']['payment_details'], true)."</pre>");
    $form['cart_contents']['#title'] = NULL;
    
    $form['account']['#title'] = NULL;
    if ($user->uid == 0) {
      $form['account']['login']['mail']['#title'] = NULL;
      $form['account']['login']['mail']['#attributes'] = array('class' => array('input-text', 'full-width'), 'placeholder' => t('Email Address'));
      $form['account']['login']['#prefix'] = '<div class="cart-collaterals row col-sm-6 col-md-6 box"> <h4><strong>'.t('Put Email Address').'</strong></h4>';
      $form['account']['login']['#suffix'] = '</div>';
    }
    
    $form['commerce_payment']['#title'] = NULL;
    $form['commerce_payment']['#prefix'] = '<h4><strong>'.t('Payment Options').'</strong></h4>';
    
    if (isset($form['commerce_payment']['payment_details']['veritrans'])) {
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['number']['#attributes']['class'] = array('input-text');
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['number']['#title'] = NULL;
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['number']['#prefix'] = "<br /><h6><strong>".t('Card Number')."</strong></h6>";
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['number']['#suffix'] = "<br /><h6><strong>".t('Expiration')."</strong></h6>";

      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['exp_month']['#attributes']['style'] = 'width:75px !important; margin-right:10px; display:inline';
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['exp_month']['#attributes']['class'] = array('selector');
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['exp_month']['#title'] = NULL;
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['exp_month']['#suffix'] = NULL;
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['exp_year']['#attributes']['style'] = 'width:85px; display:inline';
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['exp_year']['#attributes']['class'] = array('selector');
      
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['code']['#title'] = NULL;
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['code']['#prefix'] = "<br /><h6><strong>".t('Card CVV')."</strong></h6>";
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['code']['#attributes']['class'] = array('input-text');
      $form['commerce_payment']['payment_details']['veritrans']['credit_card']['code']['#attributes']['style'] = "width:65px !important";
      
      $form['commerce_payment']['payment_details']['veritrans']['phone']['#title'] = NULL;
      $form['commerce_payment']['payment_details']['veritrans']['phone']['#prefix'] = "<br /><h6><strong>".t('Phone Number')."</strong></h6>";
      $form['commerce_payment']['payment_details']['veritrans']['phone']['#attributes']['style'] = 'width:150px !important; margin-right:10px';
      $form['commerce_payment']['payment_details']['veritrans']['phone']['#attributes']['class'] = array('selector');
      
    }
    
    $form['buttons']['continue']['#attributes'] = array('class' => array('btn', 'style1'));
    
  }
}

function sepulsa_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}

function sepulsa_preprocess_block(&$vars, $hook) {
  //drupal_set_message("<pre>".print_r($vars, true)."</pre>");
  foreach ($vars['classes_array'] as $key => $value) {
    if ($value == 'block') {
      $vars['classes_array'][$key] = NULL;
    }
  }
}