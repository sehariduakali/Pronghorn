<?php

/**
 * @file
 * Kupon Rules code: actions.
 */

/**
 * Implements hook_rules_action_info().
 *
 * Declares any meta-data about actions for Rules in a big, associative, nested
 * array. See also hook_rules_action_info in the rules.api.php file, and the
 * online documentation at http://drupal.org/node/878928.
 */
function kupon_rules_action_info() {
  $actions = array(
    'kupon_create_owned_simple_coupon' => array(
      'label' => t('Create Owned Simple Coupon'), // Name displayed to admins
      'group' => t('Sepulsa'), // Used for grouping actions in select lists
      'parameter' => array(
        'order' => array(
          'type' => 'commerce_line_item',
          'label' => t('Commerce Line Item'),
        ),
        'account' => array(
          'type' => 'user',
          'label' => t('User to say hello to'),
        ),
      ),
    ),
  );
  
  return $actions;
}

/**
 * The action function for 'kupon_create_owned_simple_coupon'.
 */
function kupon_create_owned_simple_coupon($line_item, $user) {
  if ($line_item->type == "coupon") {
    //drupal_set_message("<pre>".print_r($user, true)."</pre>");
    $node_coupon = node_load($line_item->data['context']['entity']['entity_id']);
    $product = commerce_product_load($line_item->data['context']['product_ids'][0]);
    $expiry = field_get_items('commerce_product', $product, 'field_expiry_date');
    
    $node = new stdClass();
    $node->title = $node_coupon->title;
    $node->type = "owned_simple_coupon";
    $node->language = LANGUAGE_NONE;
    
    $node->field_simple_coupon[$node->language][] = array(
      'target_id' => $node_coupon->nid,
      'target_type' => 'node',
    );
    $node->field_owned_coupon_expiry[$node->language][] = array(
      'value' => $expiry[0]['value'],
      'timezone' => date_default_timezone(),
      'timezone_db' => date_default_timezone(),
      'date_type' => 'datestamp',
    );
    $node->uid = $user->uid;
    
    $node = node_submit($node); // Prepare node for saving
    node_save($node);
    drupal_set_message( "Node with nid " . $node->nid . " saved!\n");
  }
}